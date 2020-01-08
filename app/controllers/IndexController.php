<?php

use Phalcon\Mvc\Controller;
use Phalcon\Http\Response;
use Phalcon\Mvc\Dispatcher;
use App\Events\AdminProtectController;


// use App\Events\UserProtectController;

class IndexController extends Controller
{
	public function indexAction()
    {
        
    }

    public function dataAction()
    {

    }

    public function show404Action()
    {
        
    }

    public function listdataAction()
    {
        $listdatas = ncx::find(['order' => 'nomor DESC']);
        $data = array();

        foreach ($listdatas as $listdata)
        {

            
            $data[] = array(
                'nama_cc' => $listdata->nama_cc,
                'nama_pekerjaan' => $listdata->nama_pekerjaan,
                'mitra' => $listdata->mitra,
                // 'jenis_surat' => $jenissurat,
                // 'status' => $status,
                // 'verifikasi' => $verifikasi,
                'link' => $listdata->id,
            );
        }

        $content = json_encode($data);
        return $this->response->setContent($content);

    }

    public function listAction()
    {
        $this->view->data = $array;
    }

}