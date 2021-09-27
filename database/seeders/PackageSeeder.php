<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class PackageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('packages')->insert([
            'title' => 'রাইক্ষ্যং নদীর গহীন জনপদ ফারুয়া ভ্রমণ / ধূপপানি জলপ্রপাত',
            'location' => 'Belaichhari',
            'type' => 'Commercial Event',
            'location_type' => 'ঝর্ণা, দর্শনীয় স্থান',
            'description' => 'এটি একটি কমার্শিয়াল ইভেন্ট। অর্থাৎ ট্যুর শেষে কোন টাকা ফেরত পাওয়া যাবেনা। এবং কোন কারণে অতিরিক্ত টাকা খরচ হলেও দিতে হবেনা। তা আয়োজক বহন করবে।
            ট্যুর ফি এর মধ্যে অন্তর্ভূক্ত:
            -নন এসি হিনো বাসে ঢাকা টু কাপ্তাই এন্ড কাপ্তাই টু ঢাকা আসা যাওয়া
            -কাপ্তাই টু বিলাইছড়ি বোটে আসা যাওয়া (রিজার্ভ)
            সকালের নাস্তা (২ বেলা) ,দুপুরের খাবার (২ বেলা) ও রাতের খাবার (২ বেলা)
            -গাইড খরচ
            - বিলাইছড়ি থেকে দুই দিনের রিজার্ভ বোট
            -হোটেল একোমডেশন
            -লোকাল ট্যাক্সেস
            অর্থাৎ আপনার ব্যক্তিগত খরচ ছাড়া মোটামুটি সব কিছুই এতে অন্তর্ভুক্ত আছে ।
            যা যা আমরা দিবোনা:
            -বাস বিরতিতে কোন খাবার।
            -আপনার কোন ব্যক্তিগত খরচ
            আগামী ১৮ তারিখ সন্ধ্যার মধ্যেই যারা কনফার্ম করবেন তাঁদের জন্যই টিকেট কাটা হবে। পরে চাইলেও টিকেট পাওয়া যাবেনা।',
            'benefit' => '-নন এসি হিনো বাসে ঢাকা টু কাপ্তাই এন্ড কাপ্তাই টু ঢাকা আসা যাওয়া
            -কাপ্তাই টু বিলাইছড়ি বোটে আসা যাওয়া (রিজার্ভ)
            সকালের নাস্তা (২ বেলা) ,দুপুরের খাবার (২ বেলা) ও রাতের খাবার (২ বেলা)
            -গাইড খরচ
            - বিলাইছড়ি থেকে দুই দিনের রিজার্ভ বোট
            -হোটেল একোমডেশন
            -লোকাল ট্যাক্সেস
            অর্থাৎ আপনার ব্যক্তিগত খরচ ছাড়া মোটামুটি সব কিছুই এতে অন্তর্ভুক্ত আছে ।
            যা যা আমরা দিবোনা:
            -বাস বিরতিতে কোন খাবার।
            -আপনার কোন ব্যক্তিগত খরচ',
            'rule' => '১- প্রথমেই একটি ভ্রমণ পিপাসু মন থাকতে হবে।
            ২- ভ্রমণকালীন যে কোন সমস্যা নিজেরা আলোচনা করে সমাধান করতে হবে।
            ৩- ভ্রমণ সুন্দর মত পরিচালনা করার জন্য সবাই আমাদেরকে সর্বাত্মক সহায়তা করতে হবে।
            ৪- আমরা শালিনতার মধ্যে থেকে সরবোচ্য আনন্দ উপভোগ করব।
            ৫- প্রতিটি যায়গা ই আমাদের নিজেদের, তাই তার সৌন্দর্য রক্ষা করা আমাদের দায়িত্ব। যেন টুরিসম এর কোন ক্ষতি না হয়, সেটা সরবোচ্য প্রাধান্য দিতে হবে।
            ৬- অবস্থার পরিপ্রেক্ষিতে যে কোন সময় সিদ্ধান্ত বদলাতে পারে, যেটা আমরা সকলে মিলেই ঠিক করব।
            ৭- স্থানীয়দের সাথে কোন রকম বিরূপ আচরণ করা যাবে না। নতুন কারো সাথে কথা বলার ক্ষেত্রে প্রয়োজনে ট্রিপ হোস্টের সহায়তা নিতে হবে।
            ৮- কোনভাবেই কোন প্রকার মাদক সেবন বা সাথে বহন করা যাবে না। সাথে পাওয়া গেলে তাকে বা তাদেরকে তৎক্ষণাৎ ট্রিপ থেকে বহিষ্কার করা হতে পারে গ্রুপের অন্য সবার সাথে স্বীদ্ধান্ত নিয়ে।
            ৯- দুর্ঘটনা বলে কয়ে আসে না তাই যে কোন প্রকার দুর্ঘটনা সকলে মিলে মোকাবেলা করতে হবে ।
            ** ১০-  এখানে কোন প্রকার অশ্লীলতার কোন রকম সুযোগ নেই। কোন রকম অসৎ উদ্দেশ্যে যদি কেও আমাদের সাথে ভ্রমণে যান, সেটি বুঝে যেতে আমাদের খুব বেশি সময় লাগে না। এবং সেই মোতাবেক আমরা ব্যবস্থা নিবো।',
            'price' => '৫৫০০',
            'phone' => '01712444444',
            'bkash' => '01712444444',
            'deadline' => '18-08-2021',
        ]);

        DB::table('packages')->insert([
            'title' => 'চন্দ্রনাথ এবং ল্যাংগু ঝরনা',
            'location' => 'Sitakunda',
            'type' => 'Adventure',
            'location_type' => 'ঝর্ণা, পাহাড়',
            'description' => 'শুক্রবার ২০ তারিখ সকাল ৭.৩০ এর মধ্যে একেখান মোড় থেকে আমরা রওনা দিবো।যদি সম্ভব হয় গাড়িতে নাস্তার ব্যবস্থা করা হবে। আর না হলে সীতাকুন্ড বাজারে নেমে নাস্তার ব্যবস্থা করা হবে।ল্যাংগু ঝরনায় গোসল করে,আমরা চড়বো চন্দ্রনাথ পাহাড়ে।ঝরনায় যাওয়ার পথে ঝিরির আশেপাশের বাগানে দেখা মিলবে বানরের।',
            'benefit' => 'কেখান থেকে সকল ধরনের পরিবহন খরচ।
            সকালের নাস্তা এবং দুপুরের লাঞ্চ খরচ।',

            'rule' => 'এটি ট্রেকিং ইভেন্ট তাই সেইভাবেই মানসিক এবং শারীরিক প্রস্তুতি নিতে হবে সবার।
            🔰পাহাড়ি পরিবেশ নষ্ট হয় এমন কোন কাজ আমরা করবো না।
            🔰মাদকদ্রব্য ব্যবহার সম্পূর্ন নিষেধ।
            🔰টিম লিডার এবং গাইডের উপর পরিপূর্ণ আস্থা রাখতে হবে।
            🔰বিপদ বলে কয়ে আসে না, যদি বিপদ আসে সেক্ষেত্রে সকলে মিলে সমাধানের মানসিকতা থাকতে হবে।
            🔰ট্যুর চলাকালীন কোন ধরনের প্রবলেম হলে নিজেদের মধ্যে আলোচনা না করে হোস্টকে জানাবেন।',
            'price' => '৪০৯',
            'phone' => '01818888888',
            'bkash' => '01818888888',
            'deadline' => '19-08-2021',
        ]);

        DB::table('packages')->insert([
            'title' => 'সু উচ্চ ঝর্না লাংলোক এবং লিক্ষ্যং ১,২ এ টিজিবি',
            'location' => 'Thanchi',
            'type' => '3 days tour',
            'location_type' => 'ঝর্ণা',
            'description' => 'হঠাৎ করে আবার ঝর্না গুলোতে ভাল পানির ফ্লো পাওয়া যাচ্ছে বিধায় দ্রুত ইভেন্টটি দিয়ে দেওয়া হলো।
            ★ভ্রমণের স্থান সমুহঃ
            - লাংলোক
            - বড়পাথর/রাজাপাথর
            - লিক্ষ্যং ১ ও ২
            - রেমাক্রি ঝর্না
            সাথে কিছু সারপ্রাইজ তো থাকছেই (অবশ্য এই ট্রিপ পুরোই সারপ্রাইজে ভরা থাকবে)
            📢📢 ভ্রমণের সম্ভাব্য বর্ণনাঃ
            ডে-০০
            আমরা ঢাকা থেকে বাসে করে যাবো বান্দরবান যাত্রা।
            ডে-১
            সকালে বাস থেকে নেমে যত দ্রুত সম্ভব নাস্তা সেরে চান্দের গাড়িতে চলে যাবো থানচি। পার্মিশন এর কাজ সেরে যত দ্রুত নৌকায় উঠা যায়। লাঞ্চ হবে নৌকায়ই (আমরা প্যাকেট খাবার নিয়ে নিবো)। তিন্দু থেকে টানা ২(+/-) ঘন্টার হাটা পথ। হেটে যাবো লাংলোক এর পর রেমাক্রি ।
            সেখানেই রাতে থাকা।
            ডে-২
            ভোর ৬ টায় (নৌকায় যযতদুর যাওয়া যায়) এর পর আমাদের হাঁটা শুরু হবে লিক্ষ্যং এর পথে। হেটে যেতে দুই-তিন ঘন্টার মতন লাগবে। সেখানে মোটামুটি দুপুরের মধ্যে রেমাক্রি চলে আসব। এর পর সময় বুঝে রেমাক্রি অথবা নৌকায় আমারা খেয়ে নেব।',
            'benefit' => 
            
            'ঢাকা -বান্দরবন- ঢাকা নন এ/সি বাস এর টিকেট
            -২ তারিখ সকালের খাবার থেকে শুরু করে আসার দিন রাতের খাবার সহ প্রতিদিন ৩ বেলা খাবার ।
            - নৌকা ও চান্দের গাড়ি বা বাসের ভাড়া (আভ্যন্তরীণ)
            - গাইড এর খরচ ।',
            'rule' => '১- প্রথমেই একটি ভ্রমণ পিপাসু মন থাকতে হবে।
            ২- ভ্রমণকালীন যে কোন সমস্যা নিজেরা আলোচনা করে সমাধান করতে হবে।
            ৩- ভ্রমণ সুন্দর মত পরিচালনা করার জন্য সবাই আমাদেরকে সর্বাত্মক সহায়তা করতে হবে।
            ৪- আমরা শালিনতার মধ্যে থেকে সরবোচ্য আনন্দ উপভোগ করব।
            ৫- প্রতিটি যায়গা ই আমাদের নিজেদের, তাই তার সৌন্দর্য রক্ষা করা আমাদের দায়িত্ব। যেন টুরিসম এর কোন ক্ষতি না হয়, সেটা সরবোচ্য প্রাধান্য দিতে হবে।
            ৬- অবস্থার পরিপ্রেক্ষিতে যে কোন সময় সিদ্ধান্ত বদলাতে পারে, যেটা আমরা সকলে মিলেই ঠিক করব।
            ৭- স্থানীয়দের সাথে কোন রকম বিরূপ আচরণ করা যাবে না। নতুন কারো সাথে কথা বলার ক্ষেত্রে প্রয়োজনে ট্রিপ হোস্টের সহায়তা নিতে হবে।
            ৮- কোনভাবেই কোন প্রকার মাদক সেবন বা সাথে বহন করা যাবে না। সাথে পাওয়া গেলে তাকে বা তাদেরকে তৎক্ষণাৎ ট্রিপ থেকে বহিষ্কার করা হতে পারে গ্রুপের অন্য সবার সাথে স্বীদ্ধান্ত নিয়ে।
            ৯- দুর্ঘটনা বলে কয়ে আসে না তাই যে কোন প্রকার দুর্ঘটনা সকলে মিলে মোকাবেলা করতে হবে ।
            ** ১০- এই গ্রুপ সম্পূর্ণ ভ্রমণপিপাসুদের গ্রুপ। এখানে কোন প্রকার অশ্লীলতার কোন রকম সুযোগ নেই। কোন রকম অসৎ উদ্দেশ্যে যদি কেও আমাদের সাথে ভ্রমণে যান, সেটি বুঝে যেতে আমাদের খুব বেশি সময় লাগে না। এবং সেই মোতাবেক আমরা ব্যবস্থা নিবো।',
            'price' => '৬২০০',
            'phone' => '01818888888',
            'bkash' => '01818888888',
            'deadline' => '18-08-2021',
        ]);

        DB::table('packages')->insert([
            'title' => '৩ দিন ও ২ রাতের সুন্দরবন ভ্রমণ ',
            'location' => 'Bagerhat Sadar',
            'type' => '3 days tour',
            'location_type' => 'ম্যানগ্রোভ ফরেষ্ট , বন',
            'description' => '। সুপরিসর ট্যুরিষ্ট শিপে চড়ে তিন দিন দুই রাত ঘুরে বেড়াবো সুন্দরবনের বিভিন্ন স্পটে। খুলনা থেকে নদীপথে সমগ্র সুন্দরবন পাড়ি দিয়ে যাবেন বঙ্গোপসাগরের মোহনায়। তিনটা দিন জাহাজেই রাতদিন। নদীমাতৃক বাংলাদেশে সত্যিকারের ক্রুজিং এর স্বাদ শুধুমাত্র সুন্দরবন ভ্রমণের তিন দিনেই পাওয়া সম্ভব। এর বাইরেও রোমাঞ্চপ্রিয়দের জন্য রয়েছে মাঝে মাঝে ছোট নৌকায় ক্যানেল ক্রুজিং সাথে জঙ্গল ট্রেইলে এডভেঞ্চার ট্রেকিং এর সুযোগ। সবমিলিয়ে তিন দিন ১৪ বেলা  সুস্বাদু খাবারের সাথে রিলাক্স মুডে উপভোগ করুন বিশ্বের সর্ববৃহৎ ম্যানগ্রোভ ফরেষ্ট সুন্দরবন ও বঙ্গো প্রাকৃতিক সৌন্দর্য ও জাহাজের অভিজ্ঞ ক্রু দের আতিথেয়তা। বোনাস হিসেবে তাদের কাছ থেকে শুনবেন তাদের সুন্দরবনের দীর্ঘদিনের অভিজ্ঞতার গল্প। ',
            'benefit' => ' ট্যুরিষ্ট শিপে ২/৩/৪ জন শেয়ার বেসিস থাকা
            👉 তিন দিনের সকল প্রকার খাবার (ব্রেকফাষ্ট + লাঞ্চ + ডিনার ও প্রতিদিন ২ টি স্যাক্স)
            👉 ট্যুর আইটেনারী অনুযায়ী সকল স্পট পরিদর্শন
            👉 ছোট বোটে করে ক্যানেল ক্রুজিং
            👉 শেষ রাতে বার-বি-কিউ ডিনার
            👉 ২৪ ঘন্টা খাবার পানি সরবরাহ
            👉 ফরেষ্ট পারমিশন ও সকল প্রকার এন্ট্রি ফি
            👉 নিরাপওার জন্য ফরেষ্ট ডিপার্টমেন্ট থেকে ২ জন অস্ত্রধারী গার্ড
            👉 অভিজ্ঞ সার্ভিস বয়
            👉 দক্ষ ক্রু
            👉 ২ জন অভিজ্ঞ গাইড
            👉 কোন রকম হিডেন চার্জ নাই ',
            'rule' => 'ট্রান্সপোর্ট (তবে এসি নন এসি যে যেভাবে চাইবেন ব্যবস্থা করে দিবো। ঢাকা থেকে আমার সাথেও যাওয়া আসা করতে পারেন।)
            ❌ সকল প্রকার ব্যাক্তিগত খরচ
            ❌ পারর্সোনাল মেডিসিন
            ❌ প্রফেশনাল ক্যামেরা বা ড্রোনের এন্ট্রি ফি ও পারমিশন
            ❌ টিপস (দিতে চাইলে)',
            'price' => '৭৯৯৯',
            'phone' => '0171244444',
            'bkash' => '0171244444',
            'deadline' => '22-08-2021',
        ]);

    }
}
