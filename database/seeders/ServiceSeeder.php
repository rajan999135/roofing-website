<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Clear old records just in case
        // Service::truncate();
        Service::query()->delete();

        $services = [
            [
                'title'             => 'Tile Installation Services',
                'slug'              => 'tile-installation-services',
                'short_description' => 'Expert tile & stone installation for bathrooms, kitchens and floors across London.',
                'description'       => implode("\n\n", [
                    'We install porcelain, ceramic and natural stone tiles with a smooth, level finish and clean grout lines.',
                    'Our services include:',
                    '• Custom walk-in showers and wet rooms',
                    '• Bathroom and kitchen floor tiling',
                    '• Tile & stone feature walls',
                    '• Fireplaces, backsplashes and steps',
                    '• Domestic and commercial projects',
                    'New Customer Offer: get up to 20% OFF labour on your first full bathroom or tiling project when you mention this website.',
                ]),
                // we’ll treat "icon" as image filename
                'icon'             => 'services/tile-installation.jpg',
                'is_featured'      => true,
            ],

            [
                'title'             => 'Bathroom Remodeling & Refurbishment',
                'slug'              => 'bathroom-remodeling-refurbishment',
                'short_description' => 'Complete bathroom refurb from strip-out to final silicone with a 100% satisfaction focus.',
                'description'       => implode("\n\n", [
                    'From small cloakrooms to luxury family bathrooms, we handle the full job: plumbing, tiling, plastering and finishing.',
                    'What we can do for you:',
                    '• Full bathroom rip-out and redesign',
                    '• Walk-in showers and bath replacements',
                    '• Underfloor heating and waterproofing',
                    '• New ceilings, spotlights and ventilation',
                    'Special Offer for new customers: free on-site quotation and itemised estimate, with clear pricing and no hidden extras.',
                ]),
                'icon'             => 'services/bathroom-remodel.jpg',
                'is_featured'      => true,
            ],

            [
                'title'             => 'Media Walls & Bespoke Plastering',
                'slug'              => 'media-walls-bespoke-plastering',
                'short_description' => 'Bespoke media walls, feature niches and smooth plastering ready for painting.',
                'description'       => implode("\n\n", [
                    'We create modern media walls and feature units with clean lines and hidden cable management.',
                    'Our services include:',
                    '• Media walls for TVs and fireplaces',
                    '• Niche shelving and storage walls',
                    '• Smooth plastering and skimming',
                    '• Repairs, patching and ceiling work',
                    'Ask about our package pricing when you combine media wall, painting and flooring on the same project.',
                ]),
                'icon'             => 'services/media-wall.jpg',
                'is_featured'      => false,
            ],

            [
                'title'             => 'Staircase Carpets & Interior Finishing',
                'slug'              => 'staircase-carpets-interior-finishing',
                'short_description' => 'Stair runners, carpet fitting and finishing touches that transform your hall and landing.',
                'description'       => implode("\n\n", [
                    'We install stair carpets and runners with crisp edges and secure fixing for everyday use.',
                    'What we can help with:',
                    '• Stair runners and full-width carpets',
                    '• Edging, trims and stair rods',
                    '• Painting of balustrades and handrails',
                    '• Finishing touches around your renovation',
                    'Book as part of a wider project and receive a loyalty discount on repeat work for your home or rental properties.',
                ]),
                'icon'             => 'services/stairs-carpet.jpg',
                'is_featured'      => false,
            ],
        ];

        foreach ($services as $data) {
            Service::create($data);
        }
    }
}
