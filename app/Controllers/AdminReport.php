<?php

namespace App\Controllers;

use App\Models\AdminReportModel;
use CodeIgniter\Session\Session;

use function PHPUnit\Framework\throwException;

class AdminReport extends BaseController
{
    public function getIndex()
    {
        return view("adminReportPage");
    }

    public function postIndex()
    {
        $adminReport = new AdminReportModel();
        $dataToInsert = [
            'ID_admina' => $_POST['pAdminID'],
            'Tekst' => $_POST['pText']
        ];
        $adminReport->insert($dataToInsert);

        return redirect()->to("/AdminReport");
    }

    public function getBrowseAdminsReports()
    {
        $adminsReports = new AdminReportModel();
        $data = [
            'dataToShow' => $adminsReports->findAll()
        ];
        return view("browseAdminsReportsPage", $data);
    }

    public function postBrowseAdminsReports() //usuwanie wniosków
    {
        $reportToDelete = new AdminReportModel();
        $reportToDelete->delete($_POST['pReportID']);

        return redirect()->to('AdminReport/BrowseAdminsReports');
    }
}
