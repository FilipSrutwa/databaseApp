<?php

namespace App\Controllers;

use App\Models\UserReportModel;
use CodeIgniter\Session\Session;

use function PHPUnit\Framework\throwException;

class UserReport extends BaseController
{
    public function getIndex()
    {
        return view("userReportPage");
    }

    public function postIndex()
    {
        $userReport = new UserReportModel();
        $dataToInsert = [
            'ID_uzytkownika' => $_POST['pUserID'],
            'Tekst' => $_POST['pText']
        ];
        $userReport->insert($dataToInsert);

        return redirect()->to("/UserReport");
    }

    public function getBrowseUsersReports()
    {
        $userReports = new UserReportModel();
        $data = [
            'dataToShow' => $userReports->findAll()
        ];
        return view("browseUsersReportsPage", $data);
    }

    public function postBrowseUsersReports()
    {
        $reportToDelete = new UserReportModel();
        $reportToDelete->delete($_POST['pReportID']);

        return redirect()->to('UserReport/BrowseUsersReports');
    }
}
