<?php

use App\Models\Goal;
use App\Models\Title;
use App\Models\Banner;
use App\Models\CallUs;
use App\Models\RateUs;
use App\Models\Social;
use App\Models\Vision;
use App\Models\AboutUs;
use App\Models\Counter;
use App\Models\History;
use App\Models\AboutCrud;
use App\Models\ShowStatus;
use App\Models\Achievement;
use App\Models\AboutCompany;
use App\Models\ServiceContent;
use App\Models\DistinguishedTeam;

if (!function_exists('getBanner')) {
    function getBanner()
    {
        $banner = Banner::first();
        return $banner;
    }
}
if (!function_exists('getSocails')) {
    function getSocails()
    {
        $social = Social::first();
        return $social;
    }
}
if (!function_exists('aboutCompany')) {
    function aboutCompany()
    {
        $aboutCompany = AboutCompany::first();
        return $aboutCompany;
    }
}
if (!function_exists('serviceContent')) {
    function serviceContent()
    {
        $content = ServiceContent::first();
        return $content;
    }
}
if (!function_exists('ach')) {
    function ach()
    {
        $ach = Achievement::first();
        return $ach;
    }
}
if (!function_exists('counter')) {
    function counter()
    {
        $counter = Counter::first();
        return $counter;
    }

}
if (!function_exists('aboutus')) {
    function aboutus()
    {
        $aboutus = AboutUs::first();
        return $aboutus;
    }

}
if (!function_exists('goal')) {
    function goal()
    {
        $goal = Goal::first();
        return $goal;
    }

}
if (!function_exists('vision')) {
    function vision()
    {
        $vision = Vision::first();
        return $vision;
    }

}
if (!function_exists('rateUs')) {
    function rateUs()
    {
        $rateUs = RateUs::first();
        return $rateUs;
    }

}
if (!function_exists('history')) {
    function history()
    {
        $history = History::first();
        return $history;
    }

}
if (!function_exists('dteam')) {
    function dteam()
    {
        $dteam = DistinguishedTeam::first();
        return $dteam;
    }

}
if (!function_exists('callus')) {
    function callus()
    {
        $callus = CallUs::first();
        return $callus;
    }

}
//status
if (!function_exists('status')) {
    function status()
    {
        $status = ShowStatus::find('1c00a649-a4b9-4f71-a012-e27528447680');
        return $status;
    }

}
if (!function_exists('getRecords')) {
    function getRecords()
    {
        $status = AboutCrud::where('status',1)->get();
        return $status;
    }
}
//title
if (!function_exists('title')) {
    function title()
    {
        $status = Title::find('737a2259-49a9-4f79-b924-5e59ba548901');
        return $status;
    }
}
