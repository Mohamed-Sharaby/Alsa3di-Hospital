<?php


function null_string($item)
{
    return blank($item) ? '' : $item;
}

function uploadFile($file)
{
    return \Storage::disk('public')->putFile('uploads', $file);
}

function deleteImg($img)
{
    \Storage::disk('public')->delete('uploads', $img);
    return True;
}

function getImg($file)
{
    if (is_null($file)) {
        return '';
    }
    return url('/') . '/storage/' . $file;
}

function getSetting($key)
{
    if (app()->getLocale() == 'ar') {
        return \App\Models\Setting::where('name', $key)->value('ar_value');
    }
    return \App\Models\Setting::where('name', $key)->value('en_value');
}

function searchFor($query, $col, $word)
{
    $query->where($col, 'LIKE', '%' . $word . '%');
    return $query;
}

function activeTab($request)
{
    if (request()->routeIs($request)) {
        return 'active';
    }
    return '';
}


function paginateNumber()
{
    return 30;
}

function getLang($collection, $target)
{
    if (app()->getLocale() == 'en') {
        return $collection['en_' . $target];
    } else {
        return $collection['ar_' . $target];
    }
}

function roles()
{
    return [
        'doctor' => 'طبيب',
        'patient' => 'مريض',
    ];
}

function boolean()
{
    return [
        '1' => 'نعم',
        '0' => 'لا',
    ];
}

function vacations()
{
    return [
        'Sat' => 'السبت',
        'Sun' => 'الاحد',
        'Mon' => 'الاثنين',
        'Tue' => 'الثلاثاء',
        'Wed' => 'الاربعاء',
        'Thu' => 'الخميس',
        'Fri' => 'الجمعة',
    ];
}

function reservation_types()
{
    return [
        'appointment' => 'ميعاد',
        'chat' => 'محادثة',
        'consult' => 'استشارة',
        'service' => 'خدمة'
    ];
}

function reservation_status()
{
    return [
        'new'=> 'جديد',
        'confirmed'=> 'مؤكد',
        'refused'=> 'مرفوض',
        'ignored'=> 'تجاهل',
        'cancelled'=> 'الغاء',
    ];
}

function transDate($date)
{
    $time = strtotime($date);
    if (app()->getLocale() == 'en') {
        return date('l d M Y - h:i a', $time);
    }

    $months = ["Jan" => "يناير", "Feb" => "فبراير", "Mar" => "مارس", "Apr" => "أبريل", "May" => "مايو", "Jun" => "يونيو", "Jul" => "يوليو", "Aug" => "أغسطس", "Sep" => "سبتمبر", "Oct" => "أكتوبر", "Nov" => "نوفمبر", "Dec" => "ديسمبر"];
    $days = ["Sat" => "السبت", "Sun" => "الأحد", "Mon" => "الإثنين", "Tue" => "الثلاثاء", "Wed" => "الأربعاء", "Thu" => "الخميس", "Fri" => "الجمعة"];
    $am_pm = ['AM' => 'صباحاً', 'PM' => 'مساءً'];

    $day = $days[date('D', $time)];
    $month = $months[date('M', $time)];
    $am_pm = $am_pm[date('A', $time)];
    $date = $day . ' ' . date('d', $time) . ' - ' . $month . ' - ' . date('Y', $time) . '   ' . date('h:i', $time) . ' ' . $am_pm;
    $numbers_ar = ["٠", "١", "٢", "٣", "٤", "٥", "٦", "٧", "٨", "٩"];
    $numbers_en = ['0', '1', '2', '3', '4', '5', '6', '7', '8', '9'];

    return str_replace($numbers_en, $numbers_ar, $date);
}

function generalSettings()
{
    $settings = [
        'phone' => getSetting('phone'),
        'email' => getSetting('email'),
        'facebook' => getSetting('facebook'),
        'twitter' => getSetting('twitter'),
        'youtube' => getSetting('youtube'),
        'instagram' => getSetting('instagram'),
        'snapchat' => getSetting('snapchat'),
        'app_store' => getSetting('app_store'),
        'google_play' => getSetting('google_play'),
    ];
    $brief = ['brief' => \App\Models\About::withoutGlobalScopes()->first()->brief];
    $settings = \Illuminate\Support\Facades\Cache::get('settings', $settings);
    return array_merge($settings, $brief);
}

function response_json($status, $data)
{
    return response()->json(['status' => $status, 'data' => $data]);
}

function preparePhoneNumber($phone_number)
{
    $pattern = '/^(\+9665|009665|0096605|96605|5|05)/';
    $phone_number = preg_replace($pattern, 9665, $phone_number);
    return $phone_number;
}


function cart_status()
{
    return [
        'new' => 'جديد',
        'waiting' => 'قيد الانتظار',
        'confirmed' => 'مؤكد',
        'accepted' => 'تم قبول الطلب  ',
        'rejected' => 'مرفوض',
        'cancelled' => 'ملغى',
        'finished' => 'منتهي',
    ];
}
