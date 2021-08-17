<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PlacesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('places')->insert([
            'name' => 'নাফাখুম',
            'location' => 'Bandarban',
            'type' => 'ঝর্ণা',
            'checkpoint' => 'বান্দরবান জেলা সদর',
            'budget' => '3200',
            'description' => 'নাফাখুম জলপ্রপাত বান্দরবান জেলার থানচি উপজেলার রেমাক্রি ইউনিয়নে অবস্থিত। নাফাখুম দেখতে থানচি বাজার থেকে সাঙ্গু নদী পথে নৌকা দিয়ে রেমাক্রি যেতে হয়। রেমাক্রীতে রয়েছে মারমা বসতি, মারমা ভাষায় খুম মানে জলপ্রপাত। রেমাক্রী থেকে প্রায় তিন ঘন্টা পায়ে হাটলে তবেই দেখা মিলে প্রকৃতির এই অনিন্দ্য রহস্যের। রেমাক্রী খালের পানি নাফাখুমে এসে বাক খেয়ে প্রায় ২৫-৩০ ফুট নিচের দিকে নেমে গিয়ে প্রকৃতি জন্ম দিয়েছে এই জলপ্রপাতের। দ্রুত গতিতে নেমে আসা পানির জলীয় বাষ্পে সূর্য্যের আলোয় প্রতিনিয়ত এখানে রংধনু খেলা করে।সারা বছরই অ্যাডভেঞ্চার প্রিয় মানুষ নাফাখুম জলপ্রপাত দেখতে ছুটে যায়। তবে বর্ষায় প্রায়ই সাঙ্গু নদীর পানি প্রবাহ বিপদসীমার উপরে থাকলে প্রশাসন থেকে অনুমতি দেওয়া হয় না নাফাখুম যাওয়ার জন্যে। আবার শীতকালে নাফাখুমে পানি অনেকটাই কম থাকে। তাই সবচেয়ে আদর্শ সময় বর্ষার পর পর ও শীতকালের আগের সময়টুকু (সেপ্টেম্বর – নভেম্বর)। তবে যে সময়ই যান না কেন, এখানের প্রকৃতি আপনার ভালো লাগবেই। নাফাখুম ভ্রমণ আপনার জীবনে স্মরণীয় হয়ে থাকবে আজীবন।',

            'direction' => 'বান্দরবান থেকে থানচি জনপ্রতি বাস ভাড়া ২০০ টাকা,  ১৫০০টাকায় থানচি থেকে নৌকায় সাঙ্গু নদী ধরে রেমাক্রি বাজার যেতে হবে রেমাক্রি পর্যন্ত নৌকা রিজার্ভ যাওয়া ও পরদিন আসা সহ ভাড়া জনপ্রতি ১০০০ টাকা । সেখান থেকে পায়ে হেঁটে নাফাখুম যেতে হবে। রেমাক্রি থেকে আপনাকে স্থানীয় আরও একজন গাইড ৫০০ টাকা',

            'additional_info' => 'সকল দিক-নির্দেশনা মেনে চেকপয়েন্ট থেকে দ্রষ্টব্য',
        ]);
    }
}