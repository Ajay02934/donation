<?php

namespace Database\Seeders;

use App\Models\{Astrologer,AstrologyService,BookingSlot,Faq,Puja,PujaCategory,Testimonial,User};
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $admin=User::factory()->create(['name'=>'VedaJyoti Admin','email'=>'admin@vedajyoti.test','is_admin'=>true]);
        $category=PujaCategory::firstOrCreate(['slug'=>'shanti-prosperity'],['name'=>'Shanti & Prosperity','description'=>'Vedic ceremonies for harmony and blessings.']);
        foreach ([['Ganesh Puja','ganesh-puja','Removes obstacles and blesses new beginnings.',2100],['Lakshmi Puja','lakshmi-puja','A sacred invocation for abundance and wellbeing.',3100],['Navgraha Puja','navgraha-puja','A traditional ceremony for planetary harmony.',4100],['Rudrabhishek','rudrabhishek','Devotional worship of Lord Shiva for peace and strength.',5100],['Satyanarayan Puja','satyanarayan-puja','A prayer of gratitude, harmony and prosperity.',3600]] as [$name,$slug,$excerpt,$price]) { $puja=Puja::firstOrCreate(['slug'=>$slug],['puja_category_id'=>$category->id,'name'=>$name,'excerpt'=>$excerpt,'description'=>$excerpt.' Our trained priest guides the ceremony according to your family tradition.','benefits'=>['Peace of mind','Auspicious blessings','Personalised guidance'],'samagri'=>['Flowers','Fruits','Incense','Ghee lamp'],'duration'=>'2–3 hours','price'=>$price,'is_featured'=>true]); for($i=1;$i<=5;$i++) BookingSlot::firstOrCreate(['puja_id'=>$puja->id,'slot_date'=>today()->addDays($i),'start_time'=>'09:00:00'],['end_time'=>'12:00:00']); }
        foreach ([['Birth Chart / Kundli','kundli','A detailed Vedic birth-chart reading.',1800],['Marriage Matching','kundli-milan','Compatibility guidance grounded in Jyotish.',2200],['Career Astrology','career-astrology','Clarity for your professional direction.',1600]] as [$name,$slug,$description,$price]) AstrologyService::firstOrCreate(['slug'=>$slug],['name'=>$name,'description'=>$description,'benefits'=>['Personal consultation','Practical next steps'],'price'=>$price,'duration'=>'45 minutes']);
        Astrologer::firstOrCreate(['slug'=>'acharya-dev'],['name'=>'Acharya Dev Sharma','experience_years'=>18,'specialization'=>'Vedic Astrology & Muhurat','languages'=>'Hindi, English, Sanskrit','rating'=>4.9,'consultation_fee'=>1800,'availability'=>'Mon–Sat']);
        Testimonial::firstOrCreate(['name'=>'Meera Kapoor'],['city'=>'Delhi','quote'=>'The entire arrangement was graceful, clear and deeply comforting.','rating'=>5]); Faq::firstOrCreate(['question'=>'How early should I book?'],['answer'=>'We recommend booking at least 3–5 days ahead for the widest choice of slots.','sort_order'=>1]);
    }
}
