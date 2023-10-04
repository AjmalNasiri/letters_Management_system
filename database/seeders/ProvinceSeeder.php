<?php

namespace Database\Seeders;

use App\Models\District;
use App\Models\Province;
use Illuminate\Database\Seeder;

class ProvinceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $provices = [
            [
                "id" => "1",
                "name_en" => "Kabul",
                "name" => "کابل",
            ],
            [
                "id" => "2",
                "name_en" => "Kapisa",
                "name" => "کاپيسا",
            ],
            [
                "id" => "3",
                "name_en" => "Parwan",
                "name" => "پروان",
            ],
            [
                "id" => "4",
                "name_en" => "Wardak",
                "name" => "میدان وردک",
            ],
            [
                "id" => "5",
                "name_en" => "Logar",
                "name" => "لوگر",
            ],
            [
                "id" => "6",
                "name_en" => "Ghazni",
                "name" => "غزني",
            ],
            [
                "id" => "7",
                "name_en" => "Paktia",
                "name" => "پکتيا",
            ],
            [
                "id" => "8",
                "name_en" => "Nangarhar",
                "name" => "ننگرهار",
            ],
            [
                "id" => "9",
                "name_en" => "Laghman",
                "name" => "لغمان",
            ],
            [
                "id" => "10",
                "name_en" => "Kunar",
                "name" => "کنر",
            ],
            [
                "id" => "11",
                "name_en" => "Badakhshan",
                "name" => "بدخشان",
            ],
            [
                "id" => "12",
                "name_en" => "Takhar",
                "name" => "تخار",
            ],
            [
                "id" => "13",
                "name_en" => "Baghlan",
                "name" => "بغلان",
            ],
            [
                "id" => "14",
                "name_en" => "Kunduz",
                "name" => "کندوز",
            ],
            [
                "id" => "15",
                "name_en" => "Samangan",
                "name" => "سمنگان",
            ],
            [
                "id" => "16",
                "name_en" => "Balkh",
                "name" => "بلخ",
            ],
            [
                "id" => "17",
                "name_en" => "Jawzjan",
                "name" => "جوزجان",
            ],
            [
                "id" => "18",
                "name_en" => "Faryab",
                "name" => "فارياب",
            ],
            [
                "id" => "19",
                "name_en" => "Badghis",
                "name" => "بادغيس",
            ],
            [
                "id" => "20",
                "name_en" => "Herat",
                "name" => "هرات",
            ],
            [
                "id" => "21",
                "name_en" => "Farah",
                "name" => "فراه",
            ],
            [
                "id" => "22",
                "name_en" => "Nimroz",
                "name" => "نيمروز",
            ],
            [
                "id" => "23",
                "name_en" => "Hilmand",
                "name" => "هلمند",
            ],
            [
                "id" => "24",
                "name_en" => "Kandahar",
                "name" => "کندهار",
            ],
            [
                "id" => "25",
                "name_en" => "Zabul",
                "name" => "زابل",
            ],
            [
                "id" => "26",
                "name_en" => "Uruzgan",
                "name" => "ارزگان",
            ],
            [
                "id" => "27",
                "name_en" => "Ghor",
                "name" => "غور",
            ],
            [
                "id" => "28",
                "name_en" => "Bamyan",
                "name" => "باميان",
            ],
            [
                "id" => "29",
                "name_en" => "Paktika",
                "name" => "پکتيکا",
            ],
            [
                "id" => "30",
                "name_en" => "Nuristan",
                "name" => "نورستان",
            ],
            [
                "id" => "31",
                "name_en" => "Sar i Pul",
                "name" => "سرپل",
            ],
            [
                "id" => "32",
                "name_en" => "Khost",
                "name" => "خوست",
            ],
            [
                "id" => "33",
                "name_en" => "Panjshir",
                "name" => "پنجشير",
            ],
            [
                "id" => "34",
                "name_en" => "Daikundi",
                "name" => "دايکندي",
            ]
        ];

        $districts = [
            [
                "id" => "1",
                "province_id" => 1,
                "name_en" => "Deh Sabz",
                "name" => "ده سبز"
            ],
            [
                "id" => "2",
                "province_id" => 1,
                "name_en" => "Mir Bacha Kot",
                "name" => "مير بچه کوت"
            ],
            [
                "id" => "3",
                "province_id" => 1,
                "name_en" => "Kalakan",
                "name" => "کلکان"
            ],
            [
                "id" => "4",
                "province_id" => 1,
                "name_en" => "Qara Bagh",
                "name" => "قره باغ"
            ],
            [
                "id" => "5",
                "province_id" => 1,
                "name_en" => "Istalif",
                "name" => "استالف"
            ],
            [
                "id" => "6",
                "province_id" => 1,
                "name_en" => "Sharkar Dara",
                "name" => "شکردره"
            ],
            [
                "id" => "7",
                "province_id" => 1,
                "name_en" => "Paghman",
                "name" => "پغمان"
            ],
            [
                "id" => "8",
                "province_id" => 1,
                "name_en" => "Char Asyab",
                "name" => "چهارآسياب"
            ],
            [
                "id" => "9",
                "province_id" => 1,
                "name_en" => "Bagrami",
                "name" => "بگرامي"
            ],
            [
                "id" => "10",
                "province_id" => 1,
                "name_en" => "Khak Jabbar",
                "name" => "خاک جبار"
            ],
            [
                "id" => "11",
                "province_id" => 1,
                "name_en" => "Sorobi",
                "name" => "سروبي"
            ],
            [
                "id" => "12",
                "province_id" => 1,
                "name_en" => "Guldara",
                "name" => "گلدره"
            ],
            [
                "id" => "13",
                "province_id" => 1,
                "name_en" => "Mosahi",
                "name" => "موسهي"
            ],
            [
                "id" => "14",
                "province_id" => 1,
                "name_en" => "Farza",
                "name" => "فرزه"
            ],
            [
                "id" => "15",
                "province_id" => 2,
                "name_en" => "Mahmood Raqi",
                "name" => "محمود راقي"
            ],
            [
                "id" => "16",
                "province_id" => 2,
                "name_en" => "Hisa i Awal i Kohistan",
                "name" => "حصه اول کوهستان"
            ],
            [
                "id" => "17",
                "province_id" => 2,
                "name_en" => "Koh Band",
                "name" => "کوه بند"
            ],
            [
                "id" => "18",
                "province_id" => 2,
                "name_en" => "Nijrab",
                "name" => "نجراب"
            ],
            [
                "id" => "19",
                "province_id" => 2,
                "name_en" => "Tagab",
                "name" => "تگاب"
            ],
            [
                "id" => "20",
                "province_id" => 2,
                "name_en" => "Ala Saay",
                "name" => "اله ساي"
            ],
            [
                "id" => "21",
                "province_id" => 2,
                "name_en" => "Hisa i Dowom i Kohistan",
                "name" => "حصه دوم کوهستان"
            ],
            [
                "id" => "22",
                "province_id" => 3,
                "name_en" => "Charikar",
                "name" => "چاريکار"
            ],
            [
                "id" => "23",
                "province_id" => 3,
                "name_en" => "Jabal u Saraj",
                "name" => "جبل السراج"
            ],
            [
                "id" => "24",
                "province_id" => 3,
                "name_en" => "Salang",
                "name" => "سا لنگ"
            ],
            [
                "id" => "25",
                "province_id" => 3,
                "name_en" => "Shinwari",
                "name" => "شينواري"
            ],
            [
                "id" => "26",
                "province_id" => 3,
                "name_en" => "Ghorband",
                "name" => "غوربند"
            ],
            [
                "id" => "27",
                "province_id" => 3,
                "name_en" => "Shikh Ali",
                "name" => "شيخ علي"
            ],
            [
                "id" => "28",
                "province_id" => 3,
                "name_en" => "Surkh Parsa",
                "name" => "سُرخ پارسا"
            ],
            [
                "id" => "29",
                "province_id" => 3,
                "name_en" => "Bagram",
                "name" => "بگرام"
            ],
            [
                "id" => "30",
                "province_id" => 3,
                "name_en" => "Koh i Safi",
                "name" => "کوه صافي"
            ],
            [
                "id" => "31",
                "province_id" => 3,
                "name_en" => "Sayed Khail",
                "name" => "سيد خيل"
            ],
            [
                "id" => "32",
                "province_id" => 4,
                "name_en" => "Maidan Shahr",
                "name" => "ميدان شهر"
            ],
            [
                "id" => "33",
                "province_id" => 4,
                "name_en" => "Jalreez",
                "name" => "جلريز"
            ],
            [
                "id" => "34",
                "province_id" => 4,
                "name_en" => "Hisa i Awal i Behsud",
                "name" => "حصه اول  بهسود"
            ],
            [
                "id" => "35",
                "province_id" => 4,
                "name_en" => "Markaz Behsud",
                "name" => " مرکز بهسود"
            ],
            [
                "id" => "36",
                "province_id" => 4,
                "name_en" => "Dai Mirdad",
                "name" => "دايمير داد"
            ],
            [
                "id" => "37",
                "province_id" => 4,
                "name_en" => "Sayed Abad",
                "name" => "سيد آباد"
            ],
            [
                "id" => "38",
                "province_id" => 4,
                "name_en" => "Nirkh",
                "name" => "نرخ"
            ],
            [
                "id" => "39",
                "province_id" => 4,
                "name_en" => "Jaghato",
                "name" => "جغتو"
            ],
            [
                "id" => "40",
                "province_id" => 4,
                "name_en" => "Chak",
                "name" => "چک"
            ],
            [
                "id" => "41",
                "province_id" => 4,
                "name_en" => "Jalga",
                "name" => "جلگه"
            ],
            [
                "id" => "42",
                "province_id" => 5,
                "name_en" => "Pul i Alam Kulangar",
                "name" => "پل علم   کلنگار "
            ],
            [
                "id" => "43",
                "province_id" => 5,
                "name_en" => "Charkh",
                "name" => "چرخ"
            ],
            [
                "id" => "44",
                "province_id" => 5,
                "name_en" => "Baraki Barak",
                "name" => "بره کي برک"
            ],
            [
                "id" => "45",
                "province_id" => 5,
                "name_en" => "Khoshi",
                "name" => "خوشي"
            ],
            [
                "id" => "46",
                "province_id" => 5,
                "name_en" => "Mohammad Agha",
                "name" => "محمد آغه"
            ],
            [
                "id" => "47",
                "province_id" => 5,
                "name_en" => "Kharwar",
                "name" => "خروار"
            ],
            [
                "id" => "48",
                "province_id" => 5,
                "name_en" => "Azra",
                "name" => "ازره"
            ],
            [
                "id" => "49",
                "province_id" => 6,
                "name_en" => "Ghazni",
                "name" => "غزني"
            ],
            [
                "id" => "50",
                "province_id" => 6,
                "name_en" => "Jaghato",
                "name" => "جغتو"
            ],
            [
                "id" => "51",
                "province_id" => 6,
                "name_en" => "Nahor",
                "name" => "ناهور"
            ],
            [
                "id" => "52",
                "province_id" => 6,
                "name_en" => "Ajristan",
                "name" => "اجرستان"
            ],
            [
                "id" => "53",
                "province_id" => 6,
                "name_en" => "Malistan",
                "name" => "مالستان"
            ],
            [
                "id" => "54",
                "province_id" => 6,
                "name_en" => "Jaghori",
                "name" => "جاغوري"
            ],
            [
                "id" => "55",
                "province_id" => 6,
                "name_en" => "Muqur",
                "name" => "مقر"
            ],
            [
                "id" => "56",
                "province_id" => 6,
                "name_en" => "Gilan",
                "name" => "گيلان"
            ],
            [
                "id" => "57",
                "province_id" => 6,
                "name_en" => "Nawa",
                "name" => "ناوه"
            ],
            [
                "id" => "58",
                "province_id" => 6,
                "name_en" => "Ab Band",
                "name" => "آب بند"
            ],
            [
                "id" => "59",
                "province_id" => 6,
                "name_en" => "Giro",
                "name" => "گيرو"
            ],
            [
                "id" => "60",
                "province_id" => 6,
                "name_en" => "Qara Bagh",
                "name" => "قره باغ"
            ],
            [
                "id" => "61",
                "province_id" => 6,
                "name_en" => "Andar",
                "name" => "اندړ"
            ],
            [
                "id" => "62",
                "province_id" => 6,
                "name_en" => "Deh Yak",
                "name" => "ده يک"
            ],
            [
                "id" => "63",
                "province_id" => 6,
                "name_en" => "Zana Khan",
                "name" => "زنه خان"
            ],
            [
                "id" => "64",
                "province_id" => 6,
                "name_en" => "Waghaz",
                "name" => "واغظ"
            ],
            [
                "id" => "65",
                "province_id" => 6,
                "name_en" => "KhogyaniWali Mohammad Shahid",
                "name" => "خوگياني ولی محمد شهید"
            ],
            [
                "id" => "66",
                "province_id" => 6,
                "name_en" => "Rashidan",
                "name" => "رشيدان"
            ],
            [
                "id" => "67",
                "province_id" => 6,
                "name_en" => "Khawaja Umari",
                "name" => "خواجه عمري"
            ],
            [
                "id" => "68",
                "province_id" => 7,
                "name_en" => "Gardeez",
                "name" => "گرديز"
            ],
            [
                "id" => "69",
                "province_id" => 7,
                "name_en" => "Zurmat",
                "name" => "زرمت"
            ],
            [
                "id" => "70",
                "province_id" => 7,
                "name_en" => "Shawak",
                "name" => "شواک"
            ],
            [
                "id" => "71",
                "province_id" => 7,
                "name_en" => "Wazi Zadran",
                "name" => "وزی ځدران"
            ],
            [
                "id" => "72",
                "province_id" => 7,
                "name_en" => "Dand Pattan",
                "name" => "دند پټان"
            ],
            [
                "id" => "73",
                "province_id" => 7,
                "name_en" => "Laja wa Mangal",
                "name" => "لجه منگل"
            ],
            [
                "id" => "74",
                "province_id" => 7,
                "name_en" => "Jani Khail Mangal",
                "name" => "جاني خيل منگل"
            ],
            [
                "id" => "75",
                "province_id" => 7,
                "name_en" => "Samkani",
                "name" => "څمكني"
            ],
            [
                "id" => "76",
                "province_id" => 7,
                "name_en" => "Laja Ahmad Khail",
                "name" => "لجه احمد خيل"
            ],
            [
                "id" => "77",
                "province_id" => 7,
                "name_en" => "Sayed Karam",
                "name" => "سيد کرم"
            ],
            [
                "id" => "78",
                "province_id" => 7,
                "name_en" => "Jaji Aryob",
                "name" => "ځاځي  آريوب"
            ],
            [
                "id" => "79",
                "province_id" => 7,
                "name_en" => "Road Ahmad Abad",
                "name" => "رود احمد آبا"
            ],
            [
                "id" => "80",
                "province_id" => 7,
                "name_en" => "Gerda Serai",
                "name" => "گرده څيړي"
            ],
            [
                "id" => "81",
                "province_id" => 7,
                "name_en" => "Mirzakah",
                "name" => "میرزاکا"
            ],
            [
                "id" => "82",
                "province_id" => 8,
                "name_en" => "Jalalabad",
                "name" => "جلال آباد"
            ],
            [
                "id" => "83",
                "province_id" => 8,
                "name_en" => "Surkhrud",
                "name" => "سرخرود"
            ],
            [
                "id" => "84",
                "province_id" => 8,
                "name_en" => "Hisarak",
                "name" => "حصارک"
            ],
            [
                "id" => "85",
                "province_id" => 8,
                "name_en" => "Shirzad",
                "name" => "شيرازد"
            ],
            [
                "id" => "86",
                "province_id" => 8,
                "name_en" => "Khogyani",
                "name" => "خوگياني"
            ],
            [
                "id" => "87",
                "province_id" => 8,
                "name_en" => "Chaparhar",
                "name" => "چپرهار"
            ],
            [
                "id" => "88",
                "province_id" => 8,
                "name_en" => "Pachir wa Agam",
                "name" => "پچير و اگام"
            ],
            [
                "id" => "89",
                "province_id" => 8,
                "name_en" => "Rudat",
                "name" => "رودات"
            ],
            [
                "id" => "90",
                "province_id" => 8,
                "name_en" => "Achin",
                "name" => "اچين"
            ],
            [
                "id" => "91",
                "province_id" => 8,
                "name_en" => "Naziyan",
                "name" => "نازيان"
            ],
            [
                "id" => "92",
                "province_id" => 8,
                "name_en" => "Door Baba",
                "name" => "دور بابا"
            ],
            [
                "id" => "93",
                "province_id" => 8,
                "name_en" => "Shinwar Ghani Khail",
                "name" => "شينوار غني خيل "
            ],
            [
                "id" => "94",
                "province_id" => 8,
                "name_en" => "Mohmand Dara",
                "name" => "مهمند دره"
            ],
            [
                "id" => "95",
                "province_id" => 8,
                "name_en" => "Lal Pur",
                "name" => "لعل پور"
            ],
            [
                "id" => "96",
                "province_id" => 8,
                "name_en" => "Goshta",
                "name" => "گوشته"
            ],
            [
                "id" => "97",
                "province_id" => 8,
                "name_en" => "Bati Kot",
                "name" => "بټي كوټ"
            ],
            [
                "id" => "98",
                "province_id" => 8,
                "name_en" => "Kama",
                "name" => "کامه"
            ],
            [
                "id" => "99",
                "province_id" => 8,
                "name_en" => "Dara i Noor",
                "name" => "دره نور"
            ],
            [
                "id" => "100",
                "province_id" => 8,
                "name_en" => "Koz Kunar Khiwa",
                "name" => "کوزکنړ خيوه"
            ],
            [
                "id" => "101",
                "province_id" => 8,
                "name_en" => "Deh Bala Haska Mina",
                "name" => "ده بالاهسکه مينه"
            ],
            [
                "id" => "102",
                "province_id" => 8,
                "name_en" => "Behsud",
                "name" => "بهسود"
            ],
            [
                "id" => "103",
                "province_id" => 8,
                "name_en" => "Kot",
                "name" => "كوټ"
            ],
            [
                "id" => "104",
                "province_id" => 8,
                "name_en" => "Spin Ghar",
                "name" => "سپین غر"
            ],
            [
                "id" => "105",
                "province_id" => 9,
                "name_en" => "Mehtarlam Baba",
                "name" => "مهترلام"
            ],
            [
                "id" => "106",
                "province_id" => 9,
                "name_en" => "Qarghayee",
                "name" => "قرغه يي"
            ],
            [
                "id" => "107",
                "province_id" => 9,
                "name_en" => "Alinigar",
                "name" => "علينگار"
            ],
            [
                "id" => "108",
                "province_id" => 9,
                "name_en" => "Dawlat Shah",
                "name" => "دولت شاه"
            ],
            [
                "id" => "109",
                "province_id" => 9,
                "name_en" => "Alishing",
                "name" => "عليشنگ"
            ],
            [
                "id" => "110",
                "province_id" => 9,
                "name_en" => "Badpakh",
                "name" => "بادپښ"
            ],
            [
                "id" => "111",
                "province_id" => 10,
                "name_en" => "Asad Abad",
                "name" => "اسعد آباد"
            ],
            [
                "id" => "112",
                "province_id" => 10,
                "name_en" => "Marawara",
                "name" => "مروره"
            ],
            [
                "id" => "113",
                "province_id" => 10,
                "name_en" => "Dangam",
                "name" => "دانگام"
            ],
            [
                "id" => "114",
                "province_id" => 10,
                "name_en" => "Nari",
                "name" => "ناړي"
            ],
            [
                "id" => "115",
                "province_id" => 10,
                "name_en" => "Wata Purta",
                "name" => "وته پور"
            ],
            [
                "id" => "116",
                "province_id" => 10,
                "name_en" => "Chapa Dara",
                "name" => "چپه دره"
            ],
            [
                "id" => "117",
                "province_id" => 10,
                "name_en" => "Dara i Paich",
                "name" => "درهُ پيچ"
            ],
            [
                "id" => "118",
                "province_id" => 10,
                "name_en" => "Narang",
                "name" => "نرنگ"
            ],
            [
                "id" => "119",
                "province_id" => 10,
                "name_en" => "Sawkai",
                "name" => "څوكي"
            ],
            [
                "id" => "120",
                "province_id" => 10,
                "name_en" => "Noor Gul",
                "name" => "نورگل"
            ],
            [
                "id" => "121",
                "province_id" => 10,
                "name_en" => "Khas Kunar",
                "name" => "خاص کنړ"
            ],
            [
                "id" => "122",
                "province_id" => 10,
                "name_en" => "Sar Kani",
                "name" => "سركاڼي"
            ],
            [
                "id" => "123",
                "province_id" => 10,
                "name_en" => "Sheegal Sheltan",
                "name" => "شيگل شلتن"
            ],
            [
                "id" => "124",
                "province_id" => 10,
                "name_en" => "Asmar Bar Kunar",
                "name" => "برکنړ اسمار"
            ],
            [
                "id" => "125",
                "province_id" => 10,
                "name_en" => "Ghazi Abad",
                "name" => "غازي آباد"
            ],
            [
                "id" => "126",
                "province_id" => 11,
                "name_en" => "Tagab",
                "name" => "تگاب"
            ],
            [
                "id" => "127",
                "province_id" => 11,
                "name_en" => "Faiz Abad",
                "name" => "فيض آباد"
            ],
            [
                "id" => "128",
                "province_id" => 11,
                "name_en" => "Kishm",
                "name" => "کشم"
            ],
            [
                "id" => "129",
                "province_id" => 11,
                "name_en" => "Jurm",
                "name" => "جرم"
            ],
            [
                "id" => "130",
                "province_id" => 11,
                "name_en" => "Kiran wa Munjan",
                "name" => "کران و منجان"
            ],
            [
                "id" => "131",
                "province_id" => 11,
                "name_en" => "Zebak",
                "name" => "زيباک"
            ],
            [
                "id" => "132",
                "province_id" => 11,
                "name_en" => "Wakhan",
                "name" => "واخان"
            ],
            [
                "id" => "133",
                "province_id" => 11,
                "name_en" => "Ishkashim",
                "name" => "اشکاشم"
            ],
            [
                "id" => "134",
                "province_id" => 11,
                "name_en" => "Baharak",
                "name" => "بهارک"
            ],
            [
                "id" => "135",
                "province_id" => 11,
                "name_en" => "Shighnan",
                "name" => "شغنان"
            ],
            [
                "id" => "136",
                "province_id" => 11,
                "name_en" => "Darwaz",
                "name" => "درواز"
            ],
            [
                "id" => "137",
                "province_id" => 11,
                "name_en" => "Khawahan",
                "name" => "خواهان"
            ],
            [
                "id" => "138",
                "province_id" => 11,
                "name_en" => "Raghistan",
                "name" => "راغستان"
            ],
            [
                "id" => "139",
                "province_id" => 11,
                "name_en" => "Shahr i Buzurg",
                "name" => "شهربزرگ"
            ],
            [
                "id" => "140",
                "province_id" => 11,
                "name_en" => "Khash",
                "name" => "خاش"
            ],
            [
                "id" => "141",
                "province_id" => 11,
                "name_en" => "Yawan",
                "name" => "ياوان"
            ],
            [
                "id" => "142",
                "province_id" => 11,
                "name_en" => "Nasi",
                "name" => "نسي"
            ],
            [
                "id" => "143",
                "province_id" => 11,
                "name_en" => "Argo",
                "name" => "ارگو "
            ],
            [
                "id" => "144",
                "province_id" => 11,
                "name_en" => "Drayem",
                "name" => "درائم"
            ],
            [
                "id" => "145",
                "province_id" => 11,
                "name_en" => "Wardoj",
                "name" => "وردوج"
            ],
            [
                "id" => "146",
                "province_id" => 11,
                "name_en" => "Tashkan",
                "name" => "تشکان"
            ],
            [
                "id" => "147",
                "province_id" => 11,
                "name_en" => "Yamgan Girwan",
                "name" => "يمگان گیروان"
            ],
            [
                "id" => "148",
                "province_id" => 11,
                "name_en" => "Shuhada ZarDew Sarghilan",
                "name" => "شهدا زردیو و سر غیلان"
            ],
            [
                "id" => "149",
                "province_id" => 11,
                "name_en" => "Yaftal Bala wa Payan",
                "name" => "يفتل  بالا پايان"
            ],
            [
                "id" => "150",
                "province_id" => 11,
                "name_en" => "Darwaz i Bala",
                "name" => "درواز بالا"
            ],
            [
                "id" => "151",
                "province_id" => 11,
                "name_en" => "Kof Ab",
                "name" => "کوف آب"
            ],
            [
                "id" => "152",
                "province_id" => 11,
                "name_en" => "Sheki",
                "name" => "شکي"
            ],
            [
                "id" => "153",
                "province_id" => 11,
                "name_en" => "Arghang Khwah",
                "name" => "ارغنج خواه"
            ],
            [
                "id" => "154",
                "province_id" => 11,
                "name_en" => "Kohistan",
                "name" => "کوهستان"
            ],
            [
                "id" => "155",
                "province_id" => 11,
                "name_en" => "Darwazi Payeen Mayemi",
                "name" => "درواز پایین مایمی"
            ],
            [
                "id" => "156",
                "province_id" => 12,
                "name_en" => "Taliqan",
                "name" => "تالقان"
            ],
            [
                "id" => "157",
                "province_id" => 12,
                "name_en" => "Bangi",
                "name" => "بنگي"
            ],
            [
                "id" => "158",
                "province_id" => 12,
                "name_en" => "Ishkamish",
                "name" => "اشکمش"
            ],
            [
                "id" => "159",
                "province_id" => 12,
                "name_en" => "Chal",
                "name" => "چال"
            ],
            [
                "id" => "160",
                "province_id" => 12,
                "name_en" => "Warsaj",
                "name" => "ورسج"
            ],
            [
                "id" => "161",
                "province_id" => 12,
                "name_en" => "Farkhar",
                "name" => "فرخار"
            ],
            [
                "id" => "162",
                "province_id" => 12,
                "name_en" => "Kalafgan",
                "name" => "کلفگان"
            ],
            [
                "id" => "163",
                "province_id" => 12,
                "name_en" => "Rustaq",
                "name" => "رستاق "
            ],
            [
                "id" => "164",
                "province_id" => 12,
                "name_en" => "Chah i Ab",
                "name" => "چاه آب"
            ],
            [
                "id" => "165",
                "province_id" => 12,
                "name_en" => "Yangi Qala",
                "name" => "ينگي قلعه"
            ],
            [
                "id" => "166",
                "province_id" => 12,
                "name_en" => "Dar Qad",
                "name" => "درقد"
            ],
            [
                "id" => "167",
                "province_id" => 12,
                "name_en" => "Khwaja Ghar",
                "name" => "خواجه غار"
            ],
            [
                "id" => "168",
                "province_id" => 12,
                "name_en" => "Khwaja Bahawoddin",
                "name" => "خواجه بهاوالدين"
            ],
            [
                "id" => "169",
                "province_id" => 12,
                "name_en" => "Dasht Qala",
                "name" => "دشت قلعه"
            ],
            [
                "id" => "170",
                "province_id" => 12,
                "name_en" => "Baharak",
                "name" => "بهارک"
            ],
            [
                "id" => "171",
                "province_id" => 12,
                "name_en" => "Namak Ab",
                "name" => "نمک آب"
            ],
            [
                "id" => "172",
                "province_id" => 12,
                "name_en" => "Hazar Sumuch",
                "name" => "هزار سمچ"
            ],
            [
                "id" => "173",
                "province_id" => 13,
                "name_en" => "Puli Khomri",
                "name" => "پلخمري"
            ],
            [
                "id" => "174",
                "province_id" => 13,
                "name_en" => "Dahana i Ghori",
                "name" => "دهنه غوري"
            ],
            [
                "id" => "175",
                "province_id" => 13,
                "name_en" => "Doshi",
                "name" => "دوشي"
            ],
            [
                "id" => "176",
                "province_id" => 13,
                "name_en" => "Tala wa Barfak",
                "name" => "تاله و برفک"
            ],
            [
                "id" => "177",
                "province_id" => 13,
                "name_en" => "Khinjan",
                "name" => "خنجان"
            ],
            [
                "id" => "178",
                "province_id" => 13,
                "name_en" => "Andarab",
                "name" => "اندراب"
            ],
            [
                "id" => "179",
                "province_id" => 13,
                "name_en" => "Khost",
                "name" => "خوست"
            ],
            [
                "id" => "180",
                "province_id" => 13,
                "name_en" => "Nahreen",
                "name" => "نهرين"
            ],
            [
                "id" => "181",
                "province_id" => 13,
                "name_en" => "Booraka",
                "name" => "بورکه"
            ],
            [
                "id" => "182",
                "province_id" => 13,
                "name_en" => "Baghalan i Jadid",
                "name" => "بغلان جديد"
            ],
            [
                "id" => "183",
                "province_id" => 13,
                "name_en" => "Khwaja Hijran Jalga Nahrin",
                "name" => "خواجه هجران جلگه نهرین"
            ],
            [
                "id" => "184",
                "province_id" => 13,
                "name_en" => "Deh Salah",
                "name" => "ده صلاح"
            ],
            [
                "id" => "185",
                "province_id" => 13,
                "name_en" => "Fereng",
                "name" => "فرنگ"
            ],
            [
                "id" => "186",
                "province_id" => 13,
                "name_en" => "Pul i Hisar",
                "name" => "پل حصار"
            ],
            [
                "id" => "187",
                "province_id" => 13,
                "name_en" => "Guzargah i Noor",
                "name" => "گذر گاه نور"
            ],
            [
                "id" => "188",
                "province_id" => 14,
                "name_en" => "Kunduz",
                "name" => "کندز"
            ],
            [
                "id" => "189",
                "province_id" => 14,
                "name_en" => "Imam Sahib",
                "name" => "امام صاحب"
            ],
            [
                "id" => "190",
                "province_id" => 14,
                "name_en" => "Qala i Zal",
                "name" => "قلعه زال"
            ],
            [
                "id" => "191",
                "province_id" => 14,
                "name_en" => "Chahar Dara",
                "name" => "چهاردره"
            ],
            [
                "id" => "192",
                "province_id" => 14,
                "name_en" => "Ali Abad",
                "name" => "علي آباد"
            ],
            [
                "id" => "193",
                "province_id" => 14,
                "name_en" => "Khan Abad",
                "name" => "خان اباد"
            ],
            [
                "id" => "194",
                "province_id" => 14,
                "name_en" => "Dasht Archi",
                "name" => "دشت ارچي"
            ],
            [
                "id" => "195",
                "province_id" => 14,
                "name_en" => "Kalbad",
                "name" => "کلباد"
            ],
            [
                "id" => "196",
                "province_id" => 14,
                "name_en" => "Gul Tipa",
                "name" => "گل تیپه"
            ],
            [
                "id" => "197",
                "province_id" => 14,
                "name_en" => "Aftash",
                "name" => "افتاش"
            ],
            [
                "id" => "198",
                "province_id" => 15,
                "name_en" => "Aybak",
                "name" => "آيبک"
            ],
            [
                "id" => "199",
                "province_id" => 15,
                "name_en" => "Hazrat Sultan",
                "name" => "حضرت سلطان"
            ],
            [
                "id" => "200",
                "province_id" => 15,
                "name_en" => "Dara i Suf Bala",
                "name" => "دره صوف بالا"
            ],
            [
                "id" => "201",
                "province_id" => 15,
                "name_en" => "Dara i Suf i Payan",
                "name" => "دره صوف پائين"
            ],
            [
                "id" => "202",
                "province_id" => 15,
                "name_en" => "Roy do Ab",
                "name" => "روي دوآب"
            ],
            [
                "id" => "203",
                "province_id" => 15,
                "name_en" => "Khuram wa Sarbagh",
                "name" => "خرم سارباغ"
            ],
            [
                "id" => "204",
                "province_id" => 15,
                "name_en" => "Feeroz Nakhcheer",
                "name" => "فيروز نخچير"
            ],
            [
                "id" => "205",
                "province_id" => 16,
                "name_en" => "Mazar Sharif",
                "name" => "مزار شریف"
            ],
            [
                "id" => "206",
                "province_id" => 16,
                "name_en" => "Nahri Shahi",
                "name" => "نهرشاهي"
            ],
            [
                "id" => "207",
                "province_id" => 16,
                "name_en" => "Shor Teepa",
                "name" => "شورتپه"
            ],
            [
                "id" => "208",
                "province_id" => 16,
                "name_en" => "Dawlat Abad",
                "name" => "دولت آباد"
            ],
            [
                "id" => "209",
                "province_id" => 16,
                "name_en" => "Balkh",
                "name" => "بلخ"
            ],
            [
                "id" => "210",
                "province_id" => 16,
                "name_en" => "Char Boolak",
                "name" => "چاربولک"
            ],
            [
                "id" => "211",
                "province_id" => 16,
                "name_en" => "Chamtal",
                "name" => "چمتال"
            ],
            [
                "id" => "212",
                "province_id" => 16,
                "name_en" => "Sholgara",
                "name" => "شولگره"
            ],
            [
                "id" => "213",
                "province_id" => 16,
                "name_en" => "Kishindeh",
                "name" => "کشنده"
            ],
            [
                "id" => "214",
                "province_id" => 16,
                "name_en" => "Char Kent",
                "name" => "چارکنت"
            ],
            [
                "id" => "215",
                "province_id" => 16,
                "name_en" => "Deh Dadi",
                "name" => "دهدادي"
            ],
            [
                "id" => "216",
                "province_id" => 16,
                "name_en" => "Kaldar",
                "name" => "کلدار"
            ],
            [
                "id" => "217",
                "province_id" => 16,
                "name_en" => "Khulm",
                "name" => "خلم"
            ],
            [
                "id" => "218",
                "province_id" => 16,
                "name_en" => "Marmul",
                "name" => "مارمل"
            ],
            [
                "id" => "219",
                "province_id" => 16,
                "name_en" => "Hayratan",
                "name" => "حيرتان"
            ],
            [
                "id" => "220",
                "province_id" => 16,
                "name_en" => "Chahi",
                "name" => "چاهي"
            ],
            [
                "id" => "221",
                "province_id" => 16,
                "name_en" => "Zari",
                "name" => "زارع"
            ],
            [
                "id" => "222",
                "province_id" => 16,
                "name_en" => "Alburz",
                "name" => "البرز"
            ],
            [
                "id" => "223",
                "province_id" => 17,
                "name_en" => "Shibirghan",
                "name" => "شبرغان"
            ],
            [
                "id" => "224",
                "province_id" => 17,
                "name_en" => "Khawaja Do Koh",
                "name" => "خواجه دوکوه"
            ],
            [
                "id" => "225",
                "province_id" => 17,
                "name_en" => "Darz Ab",
                "name" => "درزآب"
            ],
            [
                "id" => "226",
                "province_id" => 17,
                "name_en" => "Mardeyan",
                "name" => "مرديان"
            ],
            [
                "id" => "227",
                "province_id" => 17,
                "name_en" => "Qarqeen",
                "name" => "قرقين"
            ],
            [
                "id" => "228",
                "province_id" => 17,
                "name_en" => "Aaqcha",
                "name" => "آقچه"
            ],
            [
                "id" => "229",
                "province_id" => 17,
                "name_en" => "Mengajik wa Ferari",
                "name" => "منکچک وفراري"
            ],
            [
                "id" => "230",
                "province_id" => 17,
                "name_en" => "Faiz Abad",
                "name" => "فيض آباد"
            ],
            [
                "id" => "231",
                "province_id" => 17,
                "name_en" => "Khamyab",
                "name" => "خمياب"
            ],
            [
                "id" => "232",
                "province_id" => 17,
                "name_en" => "Qush Tipa",
                "name" => "قوش تیپه"
            ],
            [
                "id" => "233",
                "province_id" => 17,
                "name_en" => "Khaniqa",
                "name" => "خانقاه"
            ],
            [
                "id" => "234",
                "province_id" => 18,
                "name_en" => "Maimana",
                "name" => "ميمنه"
            ],
            [
                "id" => "235",
                "province_id" => 18,
                "name_en" => "Pashtun Kot",
                "name" => "پشتون کوت"
            ],
            [
                "id" => "236",
                "province_id" => 18,
                "name_en" => "Almar",
                "name" => "المار"
            ],
            [
                "id" => "237",
                "province_id" => 18,
                "name_en" => "Qaisar",
                "name" => "قيصار"
            ],
            [
                "id" => "238",
                "province_id" => 18,
                "name_en" => "Kohistan",
                "name" => "کوهستان"
            ],
            [
                "id" => "239",
                "province_id" => 18,
                "name_en" => "Belcheragh",
                "name" => "بلچراغ"
            ],
            [
                "id" => "240",
                "province_id" => 18,
                "name_en" => "Garzeewan",
                "name" => "گرزيوان"
            ],
            [
                "id" => "241",
                "province_id" => 18,
                "name_en" => "Shirin Tagab",
                "name" => "شيرين تگاب"
            ],
            [
                "id" => "242",
                "province_id" => 18,
                "name_en" => "Dawlat Abad",
                "name" => "دولت آباد"
            ],
            [
                "id" => "243",
                "province_id" => 18,
                "name_en" => "Qaramqol",
                "name" => "قرمقول"
            ],
            [
                "id" => "244",
                "province_id" => 18,
                "name_en" => "Khan Charbagh",
                "name" => "خان چارباغ"
            ],
            [
                "id" => "245",
                "province_id" => 18,
                "name_en" => "And Khoy",
                "name" => "اندخوي"
            ],
            [
                "id" => "246",
                "province_id" => 18,
                "name_en" => "Khwaja Sabz Posh",
                "name" => "خواجه سبز پوش"
            ],
            [
                "id" => "247",
                "province_id" => 18,
                "name_en" => "Qarghan",
                "name" => "قرغان"
            ],
            [
                "id" => "248",
                "province_id" => 18,
                "name_en" => "Ghormach",
                "name" => "غورماچ"
            ],
            [
                "id" => "249",
                "province_id" => 19,
                "name_en" => "Qala i Now",
                "name" => "قلعه نو"
            ],
            [
                "id" => "250",
                "province_id" => 19,
                "name_en" => "Ab Kamari",
                "name" => "آب کمري"
            ],
            [
                "id" => "251",
                "province_id" => 19,
                "name_en" => "Qadis",
                "name" => "قادس"
            ],
            [
                "id" => "252",
                "province_id" => 19,
                "name_en" => "Jawand",
                "name" => "جوند"
            ],
            [
                "id" => "253",
                "province_id" => 19,
                "name_en" => "Murghab",
                "name" => "مرغاب"
            ],
            [
                "id" => "254",
                "province_id" => 19,
                "name_en" => "Muqur",
                "name" => "مقر"
            ],
            [
                "id" => "255",
                "province_id" => 20,
                "name_en" => "Herat",
                "name" => "هرات"
            ],
            [
                "id" => "256",
                "province_id" => 20,
                "name_en" => "Injil",
                "name" => "انجيل"
            ],
            [
                "id" => "257",
                "province_id" => 20,
                "name_en" => "Guzara",
                "name" => "گذره"
            ],
            [
                "id" => "258",
                "province_id" => 20,
                "name_en" => "Pashtoon Zarghoon",
                "name" => "پشتون زرغون"
            ],
            [
                "id" => "259",
                "province_id" => 20,
                "name_en" => "Kurkh",
                "name" => "کرخ"
            ],
            [
                "id" => "260",
                "province_id" => 20,
                "name_en" => "Gulran",
                "name" => "گلران"
            ],
            [
                "id" => "261",
                "province_id" => 20,
                "name_en" => "Kuhsan",
                "name" => "کهسان"
            ],
            [
                "id" => "262",
                "province_id" => 20,
                "name_en" => "Ghoreyan",
                "name" => "غوريان"
            ],
            [
                "id" => "263",
                "province_id" => 20,
                "name_en" => "Zenda Jan",
                "name" => "زنده جان"
            ],
            [
                "id" => "264",
                "province_id" => 20,
                "name_en" => "Adreskan",
                "name" => "ادرسکن"
            ],
            [
                "id" => "265",
                "province_id" => 20,
                "name_en" => "Oba",
                "name" => "اوبه"
            ],
            [
                "id" => "266",
                "province_id" => 20,
                "name_en" => "Farsi",
                "name" => "فرسي"
            ],
            [
                "id" => "267",
                "province_id" => 20,
                "name_en" => "Shindand",
                "name" => "شيندند"
            ],
            [
                "id" => "268",
                "province_id" => 20,
                "name_en" => "Chesht i Sharif",
                "name" => "چشت شريف"
            ],
            [
                "id" => "269",
                "province_id" => 20,
                "name_en" => "Kushk i Kuhna",
                "name" => "کشک کهنه"
            ],
            [
                "id" => "270",
                "province_id" => 20,
                "name_en" => "Kushk Rubatak i Sangi",
                "name" => "کشک رباط سنگي"
            ],
            [
                "id" => "271",
                "province_id" => 20,
                "name_en" => "Zir Koh",
                "name" => "زیرکوه"
            ],
            [
                "id" => "272",
                "province_id" => 20,
                "name_en" => "Poht e Koh",
                "name" => "پشت کوه"
            ],
            [
                "id" => "273",
                "province_id" => 20,
                "name_en" => "Koh Zor",
                "name" => "کوه زور"
            ],
            [
                "id" => "274",
                "province_id" => 20,
                "name_en" => "Zawal",
                "name" => "زاول"
            ],
            [
                "id" => "275",
                "province_id" => 21,
                "name_en" => "Farah",
                "name" => "فرا ه"
            ],
            [
                "id" => "276",
                "province_id" => 21,
                "name_en" => "Bakwa",
                "name" => "بکواه"
            ],
            [
                "id" => "277",
                "province_id" => 21,
                "name_en" => "Gulistan",
                "name" => "گلستان"
            ],
            [
                "id" => "278",
                "province_id" => 21,
                "name_en" => "Purchaman",
                "name" => "پرچمن"
            ],
            [
                "id" => "279",
                "province_id" => 21,
                "name_en" => "Bala Buluk",
                "name" => "بالا بلوک"
            ],
            [
                "id" => "280",
                "province_id" => 21,
                "name_en" => "Khak i Safid",
                "name" => "خاک سفيد"
            ],
            [
                "id" => "281",
                "province_id" => 21,
                "name_en" => "Anar Dara",
                "name" => "اناردره"
            ],
            [
                "id" => "282",
                "province_id" => 21,
                "name_en" => "Pusht koh Qala i Kah",
                "name" => "پشت کوه قلعه کاه"
            ],
            [
                "id" => "283",
                "province_id" => 21,
                "name_en" => "Lash Jowayn",
                "name" => "لاش جوين"
            ],
            [
                "id" => "284",
                "province_id" => 21,
                "name_en" => "Shib Koh Qala i Kah",
                "name" => "شيب کوه قلعه کاه"
            ],
            [
                "id" => "285",
                "province_id" => 21,
                "name_en" => "Pusht i Road",
                "name" => "پشترود"
            ],
            [
                "id" => "286",
                "province_id" => 22,
                "name_en" => "Zaranj",
                "name" => "زرنج"
            ],
            [
                "id" => "287",
                "province_id" => 22,
                "name_en" => "Kung",
                "name" => "کنگ"
            ],
            [
                "id" => "288",
                "province_id" => 22,
                "name_en" => "Char Burjak",
                "name" => "چاربرجک"
            ],
            [
                "id" => "289",
                "province_id" => 22,
                "name_en" => "Chakhansur",
                "name" => "چخانسور"
            ],
            [
                "id" => "290",
                "province_id" => 22,
                "name_en" => "Khashroad",
                "name" => "خاشرود"
            ],
            [
                "id" => "291",
                "province_id" => 22,
                "name_en" => "Dilaram",
                "name" => "دلارام"
            ],
            [
                "id" => "292",
                "province_id" => 23,
                "name_en" => "Nawa Mesh",
                "name" => "ناوه میش"
            ],
            [
                "id" => "293",
                "province_id" => 23,
                "name_en" => "Lashkargah",
                "name" => "لشکر گاه"
            ],
            [
                "id" => "294",
                "province_id" => 23,
                "name_en" => "Kajaki",
                "name" => "کجکي"
            ],
            [
                "id" => "295",
                "province_id" => 23,
                "name_en" => "Musa Qala",
                "name" => "موسي قلعه"
            ],
            [
                "id" => "296",
                "province_id" => 23,
                "name_en" => "Baghran",
                "name" => "باغران"
            ],
            [
                "id" => "297",
                "province_id" => 23,
                "name_en" => "Nawa Barakzayee",
                "name" => "ناوه بارکزايي"
            ],
            [
                "id" => "298",
                "province_id" => 23,
                "name_en" => "Washir",
                "name" => "واشير"
            ],
            [
                "id" => "299",
                "province_id" => 23,
                "name_en" => "Nad Ali",
                "name" => "نادعلي"
            ],
            [
                "id" => "300",
                "province_id" => 23,
                "name_en" => "Nawzad",
                "name" => "نوزاد"
            ],
            [
                "id" => "301",
                "province_id" => 23,
                "name_en" => "Garmseer Hazar Juft",
                "name" => "گرمسير هزار جفت"
            ],
            [
                "id" => "302",
                "province_id" => 23,
                "name_en" => "Sangeen",
                "name" => "سنگين"
            ],
            [
                "id" => "303",
                "province_id" => 23,
                "name_en" => "Marja",
                "name" => "مارجه"
            ],
            [
                "id" => "304",
                "province_id" => 23,
                "name_en" => "Baghni",
                "name" => "بغني"
            ],
            [
                "id" => "305",
                "province_id" => 23,
                "name_en" => "Girishk Nahr i Saraj",
                "name" => "گرشگ نهر سراج"
            ],
            [
                "id" => "306",
                "province_id" => 23,
                "name_en" => "Disho Khanshin",
                "name" => " ديشوخانشين"
            ],
            [
                "id" => "307",
                "province_id" => 23,
                "name_en" => "Reg",
                "name" => "ریگ"
            ],
            [
                "id" => "308",
                "province_id" => 24,
                "name_en" => "Kandahar",
                "name" => "کندهار"
            ],
            [
                "id" => "309",
                "province_id" => 24,
                "name_en" => "Daman",
                "name" => "دامان"
            ],
            [
                "id" => "310",
                "province_id" => 24,
                "name_en" => "Shah Wali Kot",
                "name" => "شاه ولي کوټ"
            ],
            [
                "id" => "311",
                "province_id" => 24,
                "name_en" => "Arghandab",
                "name" => "ارغنداب"
            ],
            [
                "id" => "312",
                "province_id" => 24,
                "name_en" => "Khakreez",
                "name" => "خاکريز"
            ],
            [
                "id" => "313",
                "province_id" => 24,
                "name_en" => "Ghorak",
                "name" => "غورک"
            ],
            [
                "id" => "314",
                "province_id" => 24,
                "name_en" => "Maiwand",
                "name" => "ميوند"
            ],
            [
                "id" => "315",
                "province_id" => 24,
                "name_en" => "Panjwayee",
                "name" => "پنجوائي"
            ],
            [
                "id" => "316",
                "province_id" => 24,
                "name_en" => "Reegistan",
                "name" => " ريگستان"
            ],
            [
                "id" => "317",
                "province_id" => 24,
                "name_en" => "Speen Boldak",
                "name" => "سپين بولدک"
            ],
            [
                "id" => "318",
                "province_id" => 24,
                "name_en" => "Arghistan",
                "name" => "ارغستان"
            ],
            [
                "id" => "319",
                "province_id" => 24,
                "name_en" => "Maroof",
                "name" => "معروف"
            ],
            [
                "id" => "320",
                "province_id" => 24,
                "name_en" => "Nish",
                "name" => "نيش"
            ],
            [
                "id" => "321",
                "province_id" => 24,
                "name_en" => "Zeray",
                "name" => "ژړي"
            ],
            [
                "id" => "322",
                "province_id" => 24,
                "name_en" => "Meyan Nishin",
                "name" => "ميان نشين"
            ],
            [
                "id" => "323",
                "province_id" => 24,
                "name_en" => "Dand Shorabak",
                "name" => " شورابک دند"
            ],
            [
                "id" => "324",
                "province_id" => 24,
                "name_en" => "Takhta Pul Reg",
                "name" => " ریگ تخته پل"
            ],
            [
                "id" => "325",
                "province_id" => 25,
                "name_en" => "Qalat",
                "name" => "قلات"
            ],
            [
                "id" => "326",
                "province_id" => 25,
                "name_en" => "Shah Joy",
                "name" => "شاه جوي"
            ],
            [
                "id" => "327",
                "province_id" => 25,
                "name_en" => "Arghandab",
                "name" => "ارغنداب"
            ],
            [
                "id" => "328",
                "province_id" => 25,
                "name_en" => "Dai Chopan",
                "name" => "دايچوپان"
            ],
            [
                "id" => "329",
                "province_id" => 25,
                "name_en" => "Mizan",
                "name" => "ميزان"
            ],
            [
                "id" => "330",
                "province_id" => 25,
                "name_en" => "Tarnak wa Jaldak",
                "name" => "ترنک و جلدک"
            ],
            [
                "id" => "331",
                "province_id" => 25,
                "name_en" => "Shinkay",
                "name" => "شنکي"
            ],
            [
                "id" => "332",
                "province_id" => 25,
                "name_en" => "Atghar",
                "name" => "اټغر"
            ],
            [
                "id" => "333",
                "province_id" => 25,
                "name_en" => "Shamulzai",
                "name" => "شمل زائي"
            ],
            [
                "id" => "334",
                "province_id" => 25,
                "name_en" => "Naw Bahar",
                "name" => "نو بهار"
            ],
            [
                "id" => "335",
                "province_id" => 25,
                "name_en" => "Khak Afghan Kakar",
                "name" => " کاکړ خاک افغان"
            ],
            [
                "id" => "336",
                "province_id" => 25,
                "name_en" => "Seyoray",
                "name" => "سيوري"
            ],
            [
                "id" => "337",
                "province_id" => 26,
                "name_en" => "Trinkot",
                "name" => "ترين کوټ"
            ],
            [
                "id" => "338",
                "province_id" => 26,
                "name_en" => "Chora",
                "name" => "چوره"
            ],
            [
                "id" => "339",
                "province_id" => 26,
                "name_en" => "Khas Uruzgan",
                "name" => "خاص ارزکان"
            ],
            [
                "id" => "340",
                "province_id" => 26,
                "name_en" => "Gizab",
                "name" => "گيزاب"
            ],
            [
                "id" => "341",
                "province_id" => 26,
                "name_en" => "Dehrawood",
                "name" => "دهراود"
            ],
            [
                "id" => "342",
                "province_id" => 26,
                "name_en" => "Shahid Hasas Char Cheena",
                "name" => "شهید حساس چارچينه"
            ],
            [
                "id" => "343",
                "province_id" => 26,
                "name_en" => "Chinarto",
                "name" => "چنارتو"
            ],
            [
                "id" => "344",
                "province_id" => 27,
                "name_en" => "Lal o Sar Jangal",
                "name" => "لعل و سرجنگل"
            ],
            [
                "id" => "345",
                "province_id" => 27,
                "name_en" => "Dawlatyaar",
                "name" => "دولتيار"
            ],
            [
                "id" => "346",
                "province_id" => 27,
                "name_en" => "Dolina",
                "name" => "دولينه"
            ],
            [
                "id" => "347",
                "province_id" => 27,
                "name_en" => "Charsada",
                "name" => "چارسده"
            ],
            [
                "id" => "348",
                "province_id" => 27,
                "name_en" => "Cheghcheran",
                "name" => "چغچران"
            ],
            [
                "id" => "349",
                "province_id" => 27,
                "name_en" => "Shahrak",
                "name" => "شهرک"
            ],
            [
                "id" => "350",
                "province_id" => 27,
                "name_en" => "Tulak",
                "name" => "تولک"
            ],
            [
                "id" => "351",
                "province_id" => 27,
                "name_en" => "Saghar",
                "name" => "ساغر"
            ],
            [
                "id" => "352",
                "province_id" => 27,
                "name_en" => "Teywara",
                "name" => "تيوره"
            ],
            [
                "id" => "353",
                "province_id" => 27,
                "name_en" => "Pasaband",
                "name" => "پسابند"
            ],
            [
                "id" => "354",
                "province_id" => 28,
                "name_en" => "Bamyan",
                "name" => "باميان"
            ],
            [
                "id" => "355",
                "province_id" => 28,
                "name_en" => "Shebar",
                "name" => "شيبر"
            ],
            [
                "id" => "356",
                "province_id" => 28,
                "name_en" => "Yakawlang",
                "name" => "يکاولنگ"
            ],
            [
                "id" => "357",
                "province_id" => 28,
                "name_en" => "Panjab",
                "name" => "پنجاب"
            ],
            [
                "id" => "358",
                "province_id" => 28,
                "name_en" => "Waras",
                "name" => "ورس"
            ],
            [
                "id" => "359",
                "province_id" => 28,
                "name_en" => "Saighan",
                "name" => "سيغان"
            ],
            [
                "id" => "360",
                "province_id" => 28,
                "name_en" => "Kahmard",
                "name" => "کهمرد"
            ],
            [
                "id" => "361",
                "province_id" => 28,
                "name_en" => "Yakawlang No 2",
                "name" => "یکاولنگ نمبر2"
            ],
            [
                "id" => "362",
                "province_id" => 29,
                "name_en" => "Sharan",
                "name" => "شرن"
            ],
            [
                "id" => "363",
                "province_id" => 29,
                "name_en" => "Della",
                "name" => "ډيله"
            ],
            [
                "id" => "364",
                "province_id" => 29,
                "name_en" => "Waza Khwah",
                "name" => "وازه خواه"
            ],
            [
                "id" => "365",
                "province_id" => 29,
                "name_en" => "Wormami",
                "name" => "وړممی"
            ],
            [
                "id" => "366",
                "province_id" => 29,
                "name_en" => "Gomal",
                "name" => "گومل"
            ],
            [
                "id" => "367",
                "province_id" => 29,
                "name_en" => "Umna",
                "name" => "اومنه"
            ],
            [
                "id" => "368",
                "province_id" => 29,
                "name_en" => "Surubi",
                "name" => "سروبي"
            ],
            [
                "id" => "369",
                "province_id" => 29,
                "name_en" => "Barmal",
                "name" => "برمل"
            ],
            [
                "id" => "370",
                "province_id" => 29,
                "name_en" => "Geyan",
                "name" => "گيان"
            ],
            [
                "id" => "371",
                "province_id" => 29,
                "name_en" => "Urugun",
                "name" => "ارگون"
            ],
            [
                "id" => "372",
                "province_id" => 29,
                "name_en" => "Zerok",
                "name" => "زيروک"
            ],
            [
                "id" => "373",
                "province_id" => 29,
                "name_en" => "Neka",
                "name" => "نیکه"
            ],
            [
                "id" => "374",
                "province_id" => 29,
                "name_en" => "Sar Rowza",
                "name" => "سرروضه"
            ],
            [
                "id" => "375",
                "province_id" => 29,
                "name_en" => "Matta Khan",
                "name" => "مټاخان"
            ],
            [
                "id" => "376",
                "province_id" => 29,
                "name_en" => "Usuf Khail",
                "name" => "يوسف خيل"
            ],
            [
                "id" => "377",
                "province_id" => 29,
                "name_en" => "Yahya Khail",
                "name" => "يحي خيل"
            ],
            [
                "id" => "378",
                "province_id" => 29,
                "name_en" => "Terway",
                "name" => "تروي"
            ],
            [
                "id" => "379",
                "province_id" => 29,
                "name_en" => "Jani Khail",
                "name" => "جاني خيل"
            ],
            [
                "id" => "380",
                "province_id" => 29,
                "name_en" => "Khair Kot Zarghon Shahr",
                "name" => "خیرکوټ زرغون  شهر"
            ],
            [
                "id" => "381",
                "province_id" => 30,
                "name_en" => "Noristan Paroon",
                "name" => "نورستان پارون"
            ],
            [
                "id" => "382",
                "province_id" => 30,
                "name_en" => "Kamdeesh",
                "name" => "کامديش"
            ],
            [
                "id" => "383",
                "province_id" => 30,
                "name_en" => "Waygal",
                "name" => "وايگل"
            ],
            [
                "id" => "384",
                "province_id" => 30,
                "name_en" => "Mandool",
                "name" => "منډول"
            ],
            [
                "id" => "385",
                "province_id" => 30,
                "name_en" => "Barg i Matal",
                "name" => "برگمټال"
            ],
            [
                "id" => "386",
                "province_id" => 30,
                "name_en" => "Wama",
                "name" => "واما"
            ],
            [
                "id" => "387",
                "province_id" => 30,
                "name_en" => "Noor Geram Yaningiraj",
                "name" => "نورگرام یاننگراج"
            ],
            [
                "id" => "388",
                "province_id" => 30,
                "name_en" => "Doo Ab",
                "name" => "دوآب"
            ],
            [
                "id" => "389",
                "province_id" => 31,
                "name_en" => "Sar i Pul",
                "name" => "سرپل"
            ],
            [
                "id" => "390",
                "province_id" => 31,
                "name_en" => "Sang Charak",
                "name" => "سنچارک"
            ],
            [
                "id" => "391",
                "province_id" => 31,
                "name_en" => "Kohistanat",
                "name" => "کوهستانات"
            ],
            [
                "id" => "392",
                "province_id" => 31,
                "name_en" => "Balkhab",
                "name" => "بلخاب"
            ],
            [
                "id" => "393",
                "province_id" => 31,
                "name_en" => "Sozma Qala",
                "name" => "سوزمه قلعه"
            ],
            [
                "id" => "394",
                "province_id" => 31,
                "name_en" => "Sayaad",
                "name" => "صياد"
            ],
            [
                "id" => "395",
                "province_id" => 31,
                "name_en" => "Gosfandi",
                "name" => "گوسفندي"
            ],
            [
                "id" => "396",
                "province_id" => 31,
                "name_en" => "Seori",
                "name" => "سیوری"
            ],
            [
                "id" => "397",
                "province_id" => 32,
                "name_en" => "Matoon Khost",
                "name" => "متون خوست"
            ],
            [
                "id" => "398",
                "province_id" => 32,
                "name_en" => "Jaji Maidan",
                "name" => "ځاځي ميدان"
            ],
            [
                "id" => "399",
                "province_id" => 32,
                "name_en" => "Tanai Daragi",
                "name" => "ټني  دره گي "
            ],
            [
                "id" => "400",
                "province_id" => 32,
                "name_en" => "Sepera",
                "name" => "سپيره"
            ],
            [
                "id" => "401",
                "province_id" => 32,
                "name_en" => "Musa Khail",
                "name" => "موسي خيل"
            ],
            [
                "id" => "402",
                "province_id" => 32,
                "name_en" => "Terzayee",
                "name" => "تيرزائي"
            ],
            [
                "id" => "403",
                "province_id" => 32,
                "name_en" => "Nadir Shah Kot",
                "name" => "نادر شاه كوټ"
            ],
            [
                "id" => "404",
                "province_id" => 32,
                "name_en" => "Sabri",
                "name" => "صبري"
            ],
            [
                "id" => "405",
                "province_id" => 32,
                "name_en" => "Bak",
                "name" => "باک"
            ],
            [
                "id" => "406",
                "province_id" => 32,
                "name_en" => "Gurbuz",
                "name" => "گربز"
            ],
            [
                "id" => "407",
                "province_id" => 32,
                "name_en" => "Qalandar",
                "name" => "قلندر"
            ],
            [
                "id" => "408",
                "province_id" => 32,
                "name_en" => "Ismail Khail Mandozayee",
                "name" => "اسمعيل خيل مندوزایی"
            ],
            [
                "id" => "409",
                "province_id" => 32,
                "name_en" => "Dowa Manda Shamal",
                "name" => "شمل دوه منډه"
            ],
            [
                "id" => "410",
                "province_id" => 33,
                "name_en" => "Bazarak",
                "name" => "بازارک"
            ],
            [
                "id" => "411",
                "province_id" => 33,
                "name_en" => "Rukha",
                "name" => "رخه"
            ],
            [
                "id" => "412",
                "province_id" => 33,
                "name_en" => "Hisa i Awali Khinj",
                "name" => "حصه اول خينج"
            ],
            [
                "id" => "413",
                "province_id" => 33,
                "name_en" => "Unaba",
                "name" => "عنابه"
            ],
            [
                "id" => "414",
                "province_id" => 33,
                "name_en" => "Paryan",
                "name" => "پريان"
            ],
            [
                "id" => "415",
                "province_id" => 33,
                "name_en" => "Dara",
                "name" => "دره"
            ],
            [
                "id" => "416",
                "province_id" => 33,
                "name_en" => "Shutul",
                "name" => "شتل"
            ],
            [
                "id" => "417",
                "province_id" => 33,
                "name_en" => "Abshar",
                "name" => "آبشار"
            ],
            [
                "id" => "418",
                "province_id" => 34,
                "name_en" => "Nili",
                "name" => "نيلي"
            ],
            [
                "id" => "419",
                "province_id" => 34,
                "name_en" => "Ushturlai",
                "name" => "اشترلي"
            ],
            [
                "id" => "420",
                "province_id" => 34,
                "name_en" => "Kijran",
                "name" => "کجران"
            ],
            [
                "id" => "421",
                "province_id" => 34,
                "name_en" => "Khadeer",
                "name" => "خدير"
            ],
            [
                "id" => "422",
                "province_id" => 34,
                "name_en" => "Kiti",
                "name" => "کيتي"
            ],
            [
                "id" => "423",
                "province_id" => 34,
                "name_en" => "Miramoor",
                "name" => "ميرامور"
            ],
            [
                "id" => "424",
                "province_id" => 34,
                "name_en" => "Sang i Takht",
                "name" => "سنگ تخت"
            ],
            [
                "id" => "425",
                "province_id" => 34,
                "name_en" => "Shahristan",
                "name" => "شهرستان"
            ],
            [
                "id" => "426",
                "province_id" => 34,
                "name_en" => "Pato",
                "name" => "پاتو"
            ],
            [
                "id" => "427",
                "province_id" => 1,
                "name_en" => "Nahia 1",
                "name" => "کابل ناحيه 1"
            ],
            [
                "id" => "428",
                "province_id" => 1,
                "name_en" => "Nahia 2",
                "name" => "کابل ناحيه 2"
            ],
            [
                "id" => "429",
                "province_id" => 1,
                "name_en" => "Nahia 3",
                "name" => "کابل ناحيه 3"
            ],
            [
                "id" => "430",
                "province_id" => 1,
                "name_en" => "Nahia 4",
                "name" => "کابل ناحيه 4"
            ],
            [
                "id" => "431",
                "province_id" => 1,
                "name_en" => "Nahia 5",
                "name" => "کابل ناحيه 5"
            ],
            [
                "id" => "432",
                "province_id" => 1,
                "name_en" => "Nahia 6",
                "name" => "کابل ناحيه 6"
            ],
            [
                "id" => "433",
                "province_id" => 1,
                "name_en" => "Nahia 7",
                "name" => "کابل ناحيه 7"
            ],
            [
                "id" => "434",
                "province_id" => 1,
                "name_en" => "Nahia 8",
                "name" => "کابل ناحيه 8"
            ],
            [
                "id" => "435",
                "province_id" => 1,
                "name_en" => "Nahia 9",
                "name" => "کابل ناحيه 9"
            ],
            [
                "id" => "436",
                "province_id" => 1,
                "name_en" => "Nahia 10",
                "name" => "کابل ناحيه 10"
            ],
            [
                "id" => "437",
                "province_id" => 1,
                "name_en" => "Nahia 11",
                "name" => "کابل ناحيه 11"
            ],
            [
                "id" => "438",
                "province_id" => 1,
                "name_en" => "Nahia 12",
                "name" => "کابل ناحيه 12"
            ],
            [
                "id" => "439",
                "province_id" => 1,
                "name_en" => "Nahia 13",
                "name" => "کابل ناحيه 13"
            ],
            [
                "id" => "440",
                "province_id" => 1,
                "name_en" => "Nahia 15",
                "name" => "کابل ناحيه 15"
            ],
            [
                "id" => "441",
                "province_id" => 1,
                "name_en" => "Nahia 16",
                "name" => "کابل ناحيه 16"
            ],
            [
                "id" => "442",
                "province_id" => 1,
                "name_en" => "Nahia 17",
                "name" => "کابل ناحيه 17"
            ],
            [
                "id" => "443",
                "province_id" => 1,
                "name_en" => "Center",
                "name" => "مرکز"
            ]
        ];

        foreach($provices as $province)
        {
            Province::create($province);
        }

        foreach($districts as $district)
        {
            District::create($district);
        }
    }
}
