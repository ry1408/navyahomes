<?php

namespace App\Console\Commands;

use App\Models\Plot;
use Illuminate\Console\Command;

class GeneratePlotImages extends Command
{
    protected $signature = 'plots:generate-images';
    protected $description = 'Generate placeholder images for plots using SVG';

    public function handle()
    {
        $plots = Plot::all();
        $publicPath = public_path('storage/plots');

        // Create directory if it doesn't exist
        if (!file_exists($publicPath)) {
            mkdir($publicPath, 0755, true);
        }

        $colors = [
            '#3b82f6', // Blue
            '#10b981', // Green
            '#f59e0b', // Amber
            '#8b5cf6', // Purple
            '#ec4899', // Pink
        ];

        foreach ($plots as $plot) {
            $imagePath = $publicPath . '/plot-' . $plot->id . '.svg';

            if (!file_exists($imagePath)) {
                $color = $colors[$plot->id % count($colors)];
                $status = $plot->status === 'available' ? '✓ Available' : ucfirst($plot->status);
                
                // Create SVG image
                $svg = <<<SVG
<?xml version="1.0" encoding="UTF-8"?>
<svg width="600" height="400" xmlns="http://www.w3.org/2000/svg">
    <defs>
        <linearGradient id="grad$plot->id" x1="0%" y1="0%" x2="100%" y2="100%">
            <stop offset="0%" style="stop-color:$color;stop-opacity:1" />
            <stop offset="100%" style="stop-color:#1e3a8a;stop-opacity:1" />
        </linearGradient>
    </defs>
    
    <!-- Background -->
    <rect width="600" height="400" fill="url(#grad$plot->id)"/>
    
    <!-- Decorative elements -->
    <circle cx="100" cy="100" r="30" fill="rgba(255,255,255,0.2)"/>
    <circle cx="500" cy="50" r="40" fill="rgba(255,255,255,0.15)"/>
    <circle cx="550" cy="350" r="35" fill="rgba(255,255,255,0.1)"/>
    
    <!-- Plot number -->
    <text x="300" y="150" font-size="48" font-weight="bold" fill="white" text-anchor="middle" font-family="Arial">
        Plot {$plot->plot_number}
    </text>
    
    <!-- Area -->
    <text x="300" y="220" font-size="28" fill="white" text-anchor="middle" font-family="Arial">
        {$plot->area_sqft} Sqft
    </text>
    
    <!-- Status -->
    <rect x="150" y="280" width="300" height="50" fill="rgba(255,255,255,0.2)" rx="8"/>
    <text x="300" y="315" font-size="20" fill="white" text-anchor="middle" font-family="Arial" font-weight="bold">
        $status
    </text>
</svg>
SVG;

                file_put_contents($imagePath, $svg);
                
                // Update plot with image path
                $plot->update([
                    'image' => 'plots/plot-' . $plot->id . '.svg'
                ]);
                
                $this->info("Generated image for Plot {$plot->plot_number}");
            }
        }

        $this->info('✓ All plot images generated successfully!');
    }
}
