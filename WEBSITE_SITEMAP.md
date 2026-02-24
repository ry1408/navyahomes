# 🗺️ NavyaHomes Website Site Map & Architecture

## Website Structure Overview

```
┌─────────────────────────────────────────────────────────────────┐
│                      NAVYAHOMES WEBSITE                          │
│                         Root: /                                  │
└──────────────────────────────────────────────────────────────────┘
                                │
                ┌───────────────┼───────────────┐
                │               │               │
        ┌──────▼──────┐  ┌─────▼─────┐  ┌────▼────────┐
        │   PUBLIC    │  │   ADMIN   │  │   STATIC   │
        │   PAGES     │  │   PANEL   │  │   ASSETS   │
        └──────┬──────┘  └─────┬─────┘  └────┬────────┘
               │                │            │
        ┌──────┴────────────────┴─────┬─────┴──────────┐
        │                             │               │
   ┌────▼────┐                ┌──────▼──────┐    ┌───▼───┐
   │ HOME    │                │ ADMIN PANEL │    │ CSS   │
   │ PAGE    │                │  ROUTES     │    │ & JS  │
   └────┬────┘                └──────┬──────┘    └───────┘
        │                            │
        ├──────────┬─────────────────┘
        │          │
   ┌────▼────┐ ┌──▼──────────────────────────┐
   │FEATURED │ │ PROJECTS CRUD               │
   │PROJECTS │ │ (/admin/projects/*)         │
   └────┬────┘ └──┬──────────────────────────┘
        │         │
        │         ├─ Create Project
        │         ├─ Edit Project
        │         ├─ Delete Project
        │         └─ List Projects
        │
        ├──────────────────────────────────┐
        │                                  │
   ┌────▼──────────────────┐      ┌──────▼──────────────┐
   │ PROJECTS ROUTE        │      │ PLOTS CRUD         │
   │ (/projects)           │      │ (/admin/plots/*)   │
   └────┬──────────────────┘      └──┬──────────────────┘
        │                            │
        ├─ List All Projects         ├─ Create Plot
        │  (Grid Layout)             ├─ Edit Plot
        │                            ├─ Delete Plot
        └─ Project Detail            ├─ List Plots
           (/projects/{id})          ├─ Change Status
           • Full Info               └─ Assign to Project
           • All Plots Table
           • Statistics
           • Contact CTA


┌─────────────────────────────────────────────────────────────────┐
│                    PUBLIC ROUTES TREE                            │
└─────────────────────────────────────────────────────────────────┘

/                           ← Home (Featured Projects)
├─ /projects                ← Projects Listing (Grid)
│  └─ /projects/{id}        ← Project Detail (with plots)
│
├─ /plots                   ← Plots Listing (Filterable)
│  ├─ Filter by Price
│  ├─ Filter by Area
│  ├─ Filter by Project
│  ├─ Filter by Status
│  └─ /plots/{id}           ← Plot Detail (Price Summary)
│
├─ /about                   ← About Us Page
│  ├─ Company Info
│  ├─ Team Profiles
│  ├─ Certifications
│  └─ CTAs
│
├─ /location                ← Location & Map Page
│  ├─ Interactive Map
│  ├─ Location Cards
│  └─ Distance Highlights
│
├─ /contact                 ← Contact Page
│  ├─ Contact Form
│  ├─ Contact Info
│  ├─ FAQ Section
│  └─ Office Map
│
└─ [Auth Routes]
   ├─ /login               ← Login Page
   ├─ /register            ← Register Page
   └─ /dashboard           ← User Dashboard


┌─────────────────────────────────────────────────────────────────┐
│                    ADMIN ROUTES TREE                             │
└─────────────────────────────────────────────────────────────────┘

/admin/projects             ← Projects Index
├─ /admin/projects/create   ← Create Project Form
├─ /admin/projects/{id}     ← Show Project Detail
├─ /admin/projects/{id}/edit ← Edit Project Form
└─ /admin/projects/{id}     ← Delete Project

/admin/plots                ← Plots Index
├─ /admin/plots/create      ← Create Plot Form
├─ /admin/plots/{id}        ← Show Plot Detail
├─ /admin/plots/{id}/edit   ← Edit Plot Form
├─ /admin/plots/{id}        ← Delete Plot
└─ /admin/plots/{id}/change-status ← Update Status


┌─────────────────────────────────────────────────────────────────┐
│                    DATABASE RELATIONSHIPS                        │
└─────────────────────────────────────────────────────────────────┘

        ┌──────────────────┐
        │    PROJECTS      │
        ├──────────────────┤
        │ id (PK)          │
        │ name             │
        │ location         │
        │ description      │
        │ min_price        │
        │ max_price        │
        │ featured         │
        │ created_at       │
        │ updated_at       │
        └────────┬─────────┘
                 │ 1:N
                 │ hasMany
                 │
        ┌────────▼─────────┐
        │      PLOTS       │
        ├──────────────────┤
        │ id (PK)          │
        │ project_id (FK)  │
        │ plot_number      │
        │ area_sqft        │
        │ total_price      │
        │ price_per_sqft   │
        │ status           │
        │ location         │
        │ created_at       │
        │ updated_at       │
        └──────────────────┘


┌─────────────────────────────────────────────────────────────────┐
│                    NAVIGATION FLOW                               │
└─────────────────────────────────────────────────────────────────┘

                         NAVBAR
        ┌────────────────────────────────────┐
        │ LOGO  │ NAV LINKS │ AUTH │ WhatsApp│
        │       │           │      │         │
        │ Home  │ Projects  │ Login    📱   │
        │       │ Plots     │ Register      │
        │       │ Location  │ Dashboard     │
        │       │ About     │ Logout        │
        │       │ Contact   │               │
        └────────────────────────────────────┘
                         │
                    ┌────┼────┐
                    │    │    │
            ┌───────▼─┐ ┌─▼────────┐
            │ CONTENT │ │ SIDEBAR  │
            │ AREA    │ │ (Mobile) │
            └─────────┘ └──────────┘
                    │
            ┌───────▼────────────┐
            │      FOOTER        │
            │ Links │ Contact    │
            └────────────────────┘


┌─────────────────────────────────────────────────────────────────┐
│                    USER JOURNEY PATHS                            │
└─────────────────────────────────────────────────────────────────┘

CUSTOMER PATH (Finding Properties):
    HOME
     ↓
    [Browse Featured Projects]
     ↓ (Click "View More")
    PROJECTS PAGE
     ↓ (Select Project)
    PROJECT DETAIL
     ↓ (View Plots)
    PLOTS PAGE [With Filters]
     ↓ (Apply Filters)
    [Filtered Results]
     ↓ (Click Plot)
    PLOT DETAIL
     ↓ (Choose Contact)
    ├─ [Call Button]
    ├─ [WhatsApp Button]
    └─ [Book Visit Button]
         ↓
    CONTACT PAGE / CHAT

INQUIRY PATH:
    ANY PAGE
     ↓ (Click "Contact" or "WhatsApp")
    CONTACT PAGE
     ↓ (Fill Form)
    [Validation]
     ↓ (Submit)
    [Success Message]
     ↓ (Email Sent)
    ADMIN RECEIVES INQUIRY

ADMIN PATH (Managing Properties):
    LOGIN
     ↓
    DASHBOARD
     ↓
    ├─ PROJECTS MANAGEMENT
    │  ├─ View All Projects
    │  ├─ Create New Project
    │  ├─ Edit Project
    │  └─ Delete Project
    │
    └─ PLOTS MANAGEMENT
       ├─ View All Plots
       ├─ Create New Plot
       ├─ Edit Plot
       ├─ Change Plot Status
       └─ Delete Plot


┌─────────────────────────────────────────────────────────────────┐
│                    FEATURE LOCATIONS                             │
└─────────────────────────────────────────────────────────────────┘

FILTERING SYSTEM
Location: /plots page
└─ Sidebar (Left)
   ├─ Price Range Filter
   ├─ Area Range Filter
   ├─ Project Dropdown
   ├─ Status Filter
   ├─ Apply Filters Button
   └─ Clear Filters Button

STATISTICS
Location: Home page
└─ Statistics Section
   ├─ Total Projects Card
   ├─ Total Plots Card
   ├─ Available Plots Card
   └─ Sold Plots Card

TEAM PROFILES
Location: About page
└─ Leadership Team Section
   ├─ CEO Card
   ├─ COO Card
   └─ CDO Card

CONTACT METHODS
Location: Contact page
└─ Multiple Contact Cards
   ├─ Phone Card
   ├─ WhatsApp Card
   ├─ Email Card
   └─ Office Card

MAP INTEGRATION
Location: Location & Contact pages
└─ Interactive Google Map
   ├─ Location page: Multiple locations
   └─ Contact page: Office location


┌─────────────────────────────────────────────────────────────────┐
│                    RESPONSIVE BEHAVIOR                           │
└─────────────────────────────────────────────────────────────────┘

MOBILE (320px - 640px)
├─ 1 Column Layout
├─ Hamburger Menu
├─ Stack all elements
└─ Full-width cards

TABLET (641px - 1024px)
├─ 2 Column Layout
├─ Sidebar visible
├─ Grid adjusts
└─ Touch-friendly buttons

DESKTOP (1025px+)
├─ 3-4 Column Layout
├─ Full layout
├─ Optimal spacing
└─ Mouse interactions

LARGE (1280px+)
├─ Full width layout
├─ Max-width container
├─ Centered content
└─ Best spacing


┌─────────────────────────────────────────────────────────────────┐
│                    DATA FLOW DIAGRAM                             │
└─────────────────────────────────────────────────────────────────┘

REQUEST
  │
  ├─→ Route Matching
  │   └─→ /plots
  │
  ├─→ Controller
  │   └─→ PlotController@index
  │
  ├─→ Query Builder
  │   ├─→ Filter by price
  │   ├─→ Filter by area
  │   ├─→ Filter by project
  │   └─→ Filter by status
  │
  ├─→ Database
  │   └─→ SELECT plots WHERE...
  │
  ├─→ Pagination
  │   └─→ 12 per page
  │
  ├─→ View Rendering
  │   └─→ plots/index.blade.php
  │
  └─→ RESPONSE (HTML)
      └─→ Browser Display


┌─────────────────────────────────────────────────────────────────┐
│                    PAGE LOAD SEQUENCE                            │
└─────────────────────────────────────────────────────────────────┘

1. REQUEST
   └─ Browser requests /plots

2. ROUTING
   └─ Laravel router matches route

3. MIDDLEWARE
   ├─ CORS handling
   ├─ CSRF verification
   └─ Session handling

4. CONTROLLER
   └─ PlotController@index method executes

5. DATABASE
   ├─ Query projects (for filter dropdown)
   ├─ Query plots (with filters)
   └─ Count total results

6. VIEW PREPARATION
   ├─ Pass data to view
   ├─ Compile Blade templates
   └─ Generate HTML

7. RENDERING
   ├─ Render layout
   ├─ Render content section
   └─ Apply CSS/JS

8. RESPONSE
   └─ HTML sent to browser

9. BROWSER
   ├─ Parse HTML
   ├─ Load CSS
   ├─ Load JS
   ├─ Render page
   └─ User sees website


┌─────────────────────────────────────────────────────────────────┐
│                    CONTENT HIERARCHY                             │
└─────────────────────────────────────────────────────────────────┘

INFORMATION ARCHITECTURE:

Level 1: Home Page
└─ Entry Point
   ├─ Learn about company
   ├─ See featured projects
   ├─ View statistics
   └─ Take action (browse/contact)

Level 2: Projects & Plots Listing
└─ Browse Options
   ├─ See all available properties
   ├─ Filter by criteria
   ├─ View property cards
   └─ Click for details

Level 3: Details Pages
└─ Detailed Information
   ├─ Full property information
   ├─ Pricing breakdown
   ├─ Related properties
   └─ Call-to-action

Level 4: Static Pages
└─ Support Information
   ├─ About the company
   ├─ Office locations
   ├─ Contact information
   └─ FAQ


┌─────────────────────────────────────────────────────────────────┐
│                    CONVERSION FUNNELS                            │
└─────────────────────────────────────────────────────────────────┘

INQUIRY FUNNEL:
    Website Visit
         ↓ (Browse)
    Property View
         ↓ (Interest)
    Click WhatsApp/Call
         ↓ (Engagement)
    Contact Form Submission
         ↓ (Intent)
    Admin Receives Inquiry
         ↓ (Lead)
    Sales Follow-up
         ↓ (Conversion)
    SALE ✓

CTA DISTRIBUTION:
- Home Page: 3 CTAs (Hero, Stats, Bottom)
- Projects: 1 CTA (View Details)
- Project Detail: 1 CTA (Book Visit)
- Plots: 1 CTA (WhatsApp) per card
- Plot Detail: 3 CTAs (Call, WhatsApp, Book)
- About: 2 CTAs (Explore, Contact)
- Location: 1 CTA (Book Visit)
- Contact: 1 CTA (Submit Form)


┌─────────────────────────────────────────────────────────────────┐
│                    SUPPORT REFERENCES                            │
└─────────────────────────────────────────────────────────────────┘

For Detailed Information, See:
├─ IMPLEMENTATION_CHECKLIST.md (114-item checklist)
├─ WEBSITE_IMPLEMENTATION_COMPLETE.md (Full details)
├─ WEBSITE_QUICK_REFERENCE.md (Quick answers)
├─ PROJECT_DELIVERY_SUMMARY.md (Overview)
└─ README_WEBSITE.md (Getting started)

---

**Site Map Generated:** January 27, 2026
**Website Status:** ✅ Production Ready
**Version:** 1.0
