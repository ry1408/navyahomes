# Phase 2 - API Documentation

## Admin Controller Methods

### ProjectController

#### index()
- **Route**: GET /admin/projects
- **Auth**: Required (auth, verified)
- **Returns**: Blade view with paginated projects
- **View**: admin.projects.index
- **Data**: 
  - `$projects` - Paginated collection (15 per page)
  - Each project includes relationships and stats

#### create()
- **Route**: GET /admin/projects/create
- **Auth**: Required
- **Returns**: Blade form view
- **View**: admin.projects.create

#### store()
- **Route**: POST /admin/projects
- **Auth**: Required
- **Request Body**:
  ```json
  {
    "name": "string|required|max:255",
    "location": "string|required|max:255",
    "description": "string|nullable",
    "price_per_sqft": "numeric|required|min:0",
    "total_plots": "integer|required|min:1",
    "status": "enum:active,inactive|required"
  }
  ```
- **Returns**: Redirect to projects.index with success message
- **Validation**: All fields validated before insertion

#### edit(Project $project)
- **Route**: GET /admin/projects/{project}
- **Auth**: Required
- **Parameters**: project ID (route model binding)
- **Returns**: Blade form view
- **View**: admin.projects.edit
- **Data**: `$project` - Current project details

#### update(Request $request, Project $project)
- **Route**: PUT /admin/projects/{project}
- **Auth**: Required
- **Request Body**: Same as store()
- **Returns**: Redirect to projects.index with success message
- **Validation**: All fields validated before update

#### destroy(Project $project)
- **Route**: DELETE /admin/projects/{project}
- **Auth**: Required
- **Returns**: Redirect to projects.index with success message
- **Side Effects**: Cascade deletes all associated plots

---

### PlotController

#### index()
- **Route**: GET /admin/plots
- **Auth**: Required
- **Returns**: Blade view with paginated plots
- **View**: admin.plots.index
- **Data**:
  - `$plots` - Paginated collection (20 per page)
  - Each plot includes project relationship

#### create()
- **Route**: GET /admin/plots/create
- **Auth**: Required
- **Returns**: Blade form view
- **View**: admin.plots.create
- **Data**: `$projects` - Active projects only

#### store()
- **Route**: POST /admin/plots
- **Auth**: Required
- **Request Body**:
  ```json
  {
    "project_id": "exists:projects,id|required",
    "plot_number": "string|required|max:50",
    "area_sqft": "numeric|required|min:0.01",
    "status": "enum:available,booked,sold|required"
  }
  ```
- **Auto-Calculation**: total_price = area_sqft × project.price_per_sqft
- **Returns**: Redirect to plots.index with success message
- **Validation**: All fields validated, project must exist

#### edit(Plot $plot)
- **Route**: GET /admin/plots/{plot}
- **Auth**: Required
- **Returns**: Blade form view or redirect if sold
- **View**: admin.plots.edit
- **Data**: `$plot`, `$projects`
- **Restriction**: Redirects if plot.status === 'sold'

#### update(Request $request, Plot $plot)
- **Route**: PUT /admin/plots/{plot}
- **Auth**: Required
- **Request Body**:
  ```json
  {
    "plot_number": "string|required|max:50",
    "area_sqft": "numeric|required|min:0.01",
    "status": "enum:available,booked,sold|required"
  }
  ```
- **Auto-Calculation**: Recalculates if area_sqft changes
- **Returns**: Redirect to plots.index with success message
- **Restriction**: Blocked for sold plots

#### destroy(Plot $plot)
- **Route**: DELETE /admin/plots/{plot}
- **Auth**: Required
- **Returns**: Redirect to plots.index with success message
- **Restriction**: Blocked for sold plots

#### changeStatus(Request $request, Plot $plot)
- **Route**: PATCH /admin/plots/{plot}/change-status
- **Auth**: Required
- **Request Body**:
  ```json
  {
    "status": "enum:available,booked,sold|required"
  }
  ```
- **Returns**: Redirect back with success message
- **Restriction**: Blocked for sold plots
- **Usage**: Quick status update without full plot edit

---

## Eloquent Models

### Project Model

```php
// Relationships
$project->plots();           // HasMany
$project->plots()->count();  // Get plot count

// Accessors
$stats = $project->stats;    // Array with counts

// Attributes
$project->name              // Project name
$project->location          // Location string
$project->description       // Description text
$project->price_per_sqft    // Decimal(12,2)
$project->total_plots       // Integer
$project->status            // 'active' or 'inactive'
$project->created_at        // Timestamp
$project->updated_at        // Timestamp
```

### Plot Model

```php
// Relationships
$plot->project();            // BelongsTo

// Methods
$plot->isSold();             // Boolean
$plot->isBooked();           // Boolean
$plot->isAvailable();        // Boolean

// Attributes
$plot->plot_number           // String
$plot->area_sqft             // Decimal(12,2)
$plot->total_price           // Decimal(15,2) - Auto-calc
$plot->status                // 'available', 'booked', 'sold'
$plot->created_at            // Timestamp
$plot->updated_at            // Timestamp

// Auto-Calculated Field
// total_price = area_sqft × project.price_per_sqft
// Recalculates on area_sqft or project_id change
```

---

## Database Schema

### Projects Table
```sql
CREATE TABLE projects (
  id bigint unsigned PRIMARY KEY AUTO_INCREMENT,
  name varchar(191) NOT NULL,
  location varchar(191) NOT NULL,
  description longtext,
  price_per_sqft decimal(12,2) NOT NULL,
  total_plots int NOT NULL,
  status enum('active','inactive') DEFAULT 'active',
  created_at timestamp,
  updated_at timestamp
);
```

### Plots Table
```sql
CREATE TABLE plots (
  id bigint unsigned PRIMARY KEY AUTO_INCREMENT,
  project_id bigint unsigned NOT NULL,
  plot_number varchar(191) NOT NULL,
  area_sqft decimal(12,2) NOT NULL,
  total_price decimal(15,2) NOT NULL,
  status enum('available','booked','sold') DEFAULT 'available',
  created_at timestamp,
  updated_at timestamp,
  
  FOREIGN KEY (project_id) REFERENCES projects(id) ON DELETE CASCADE,
  UNIQUE KEY unique_project_plot (project_id, plot_number)
);
```

---

## Query Examples

```php
// Get all projects with plot counts
Project::withCount('plots')->get();

// Get all available plots
Plot::where('status', 'available')->get();

// Get plots by project
Project::find($id)->plots()->get();

// Get plot statistics
$stats = Plot::selectRaw('status, COUNT(*) as count')
             ->groupBy('status')
             ->get();

// Get expensive plots (auto-calculated price > 500000)
Plot::where('total_price', '>', 500000)->get();

// Get plots in specific project with status
Project::find($id)->plots()
       ->where('status', 'booked')
       ->get();

// Calculate total value of available plots
Plot::where('status', 'available')
    ->sum('total_price');

// Get projects by status
Project::where('status', 'active')->with('plots')->get();
```

---

## Error Handling

### Controller Validations
- **Missing required fields**: Returns validation errors
- **Invalid enum values**: Rejects with validation message
- **Non-existent project**: Returns 404
- **Non-existent plot**: Returns 404
- **Sold plot edit**: Redirects with error message
- **Sold plot delete**: Redirects with error message

### Database Constraints
- **Foreign key violation**: Prevents orphaned plots
- **Unique constraint**: Prevents duplicate plot numbers in project
- **NOT NULL constraints**: Enforces data completeness

---

## Admin Views

### Projects Index
- Displays: Name, Location, Price/Sqft, Stats, Status, Actions
- Features: Pagination, Edit/Delete buttons, Status badges
- Stats shown: Available, Booked, Sold count

### Projects Create/Edit
- Form fields: Name, Location, Description, Price/Sqft, Total Plots, Status
- Validation feedback inline
- Cancel button returns to list

### Plots Index
- Displays: Plot #, Project, Area, Price, Status, Actions
- Features: Pagination, Color-coded status badges
- Edit/Delete only available for non-sold plots

### Plots Create/Edit
- Auto-selects project with price/sqft info
- Area input with auto-calculation notice
- Displays calculated total price
- Status selector with all options

---

## Business Logic Rules

| Rule | Implementation |
|------|-----------------|
| Sold plots locked | `if ($plot->isSold()) return redirect...` |
| Auto-price calc | Model boot() method listening to `creating` and `updating` |
| Cascade delete | Database foreign key with CASCADE |
| Unique plot per project | Database unique constraint |
| Status restrictions | Enum at DB + Controller validation |
| Project filtering | Only active projects in create form |

---

## Testing Endpoints

```bash
# Create project
POST /admin/projects
Body: {name, location, price_per_sqft, total_plots, status}

# List projects
GET /admin/projects?page=1

# Edit project
PUT /admin/projects/1
Body: {name, location, price_per_sqft, total_plots, status}

# Create plot
POST /admin/plots
Body: {project_id, plot_number, area_sqft, status}

# Change plot status
PATCH /admin/plots/1/change-status
Body: {status: "sold"}

# List plots
GET /admin/plots?page=1

# Delete project
DELETE /admin/projects/1
```

---

## Sample Response

### Get Projects List
```json
{
  "data": [
    {
      "id": 1,
      "name": "Navya Heights",
      "location": "DHA Sector 12",
      "price_per_sqft": 500.00,
      "total_plots": 50,
      "status": "active",
      "created_at": "2026-01-27T10:00:00Z"
    }
  ],
  "pagination": {
    "current_page": 1,
    "total": 3,
    "per_page": 15
  }
}
```

---

**Documentation Version**: 1.0  
**Date**: January 27, 2026  
**Status**: Complete ✅
