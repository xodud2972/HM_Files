<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function dailyWork()
    {
        echo view('/include/view_header.php');
        echo view('/include/view_side_menu.php');

        echo view('/DailyWork/view_dailyWork'); // 일일업무일지

        echo view('/include/view_footer.php');
        // echo view('footer'); 
    }
    public function dailyWorkList()
    {
        echo view('/include/view_header.php');
        echo view('/include/view_side_menu.php');

        echo view('/DailyWork/view_dailyWorkList'); // 일일업무통계

        echo view('/include/view_footer.php');
    }
    public function popup_dailyWork()
    {
        echo view('popup/popup_dailyWork'); // 가망광고주등록 팝업
    }
    public function popup_dailyWorkList()
    {
        echo view('popup/popup_dailyWorkList'); // 업무일지통계 상세팝업
    }
}
