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

    public function storeformAction()
    {
        $dokumen = new ncx();
        $nama_cc = $this->request->getPost('nama_cc');
        $nama_pekerjaan = $this->request->getPost('nama_pekerjaan');
        $mitra = $this->request->getPost('mitra');
        $nilai_nrc = $this->request->getPost('nilai_nrc');
        $nilai_mrc = $this->request->getPost('nilai_mrc');
        $status_ncx = $this->request->getPost('status_ncx');
        $kendala = $this->request->getPost('kendala');
        $no_quote = $this->request->getPost('no_quote');
        $no_agreement = $this->request->getPost('no_agreement');
        $tipe_order = $this->request->getPost('tipe_order');
        
        
        $dokumen->nama_cc = $nama_cc;
        $dokumen->nama_pekerjaan = $nama_pekerjaan;
        $dokumen->mitra = $mitra;
        $dokumen->nilai_nrc = $nilai_nrc;
        $dokumen->nilai_mrc = $nilai_mrc;
        $dokumen->status_ncx = $status_ncx;
        $dokumen->kendala = $kendala;
        $dokumen->no_quote = $no_quote;
        $dokumen->no_agreement = $no_agreement;
        $dokumen->tipe_order = $tipe_order;
        $dokumen->save();
        // echo $no_agreement; die();
        // var_dump($dokumen); die();
        // if($dokumen->save())
        // {
        //     echo "tersimpan"; die();

        // }
        // else{
        //     echo "gagal"; die();
        // }
        $max = ncx::maximum(
            [
                'column' => 'id',
            ]
        );

        $data = ncx::findFirst("id='$max'");
        if($tipe_order == 1)
        {
            $detail = new connectivity();
            $id_ncx = $data->id;
            $no_order_con = $this->request->getPost('no_order_con');
            $baso_con = $this->request->getPost('baso_con');
            $jenis_termin_con = $this->request->getPost('jenis_termin_con');
            $billing_nol_con = $this->request->getPost('billing_nol_con');
            $billing_com_con = $this->request->getPost('billing_com_con');
            $asset_con = $this->request->getPost('asset_con');
            $approval_sm_con = $this->request->getPost('approval_sm_con');
            $approval_ubc_con = $this->request->getPost('approval_ubc_con');

            $detail->id_ncx = $id_ncx;
            $detail->no_order_con = $no_order_con;
            $detail->baso_con = $baso_con;
            $detail->jenis_termin_con = $jenis_termin_con;
            $detail->billing_nol_con = $billing_nol_con;
            $detail->billing_com_con = $billing_com_con;
            $detail->asset_con = $asset_con;
            $detail->approval_sm_con = $approval_sm_con;
            $detail->approval_ubc_con = $approval_ubc_con;
            $detail->save();
        }
        elseif($tipe_order == 2)
        {
            $detail = new cpe();
            $id_ncx = $data->id;
            $dok_p6 = $this->request->getPost('dok_p6');
            $dok_p8 = $this->request->getPost('dok_p8');
            $dok_kl_wo = $this->request->getPost('dok_kl_wo');
            $approval_sm_crm = $this->request->getPost('approval_sm_crm');
            $no_order = $this->request->getPost('no_order');
            $wfm_mitra = $this->request->getPost('wfm_mitra');
            $approval_wfm = $this->request->getPost('approval_wfm');
            $status_nde = $this->request->getPost('status_nde');
            $approval_des = $this->request->getPost('approval_des');
            $baso = $this->request->getPost('baso');
            $jenis_termin = $this->request->getPost('jenis_termin');
            $billing_nol = $this->request->getPost('billing_nol');
            $billing_com = $this->request->getPost('billing_com');
            $asset = $this->request->getPost('asset');
            $approval_sm = $this->request->getPost('approval_sm');
            $approval_ubc = $this->request->getPost('approval_ubc');

            $detail->id_ncx = $id_ncx;
            $detail->dok_p6 = $dok_p6;
            $detail->dok_p8 = $dok_p8;
            $detail->dok_kl_wo = $dok_kl_wo;
            $detail->approval_sm_crm = $approval_sm_crm;
            $detail->no_order = $no_order;
            $detail->wfm_mitra = $wfm_mitra;
            $detail->approval_wfm = $approval_wfm;
            $detail->status_nde = $status_nde;
            $detail->approval_des = $approval_des;
            $detail->baso = $baso;
            $detail->jenis_termin = $jenis_termin;
            $detail->billing_nol = $billing_nol;
            $detail->billing_com = $billing_com;
            $detail->asset = $asset;
            $detail->approval_sm = $approval_sm;
            $detail->approval_ubc = $approval_ubc;
            $detail->save();

        }
    }

    public function show404Action()
    {
        
    }

    public function listdataAction()
    {
        $listdatas = ncx::find();
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

    }

    public function detailAction($id)
    {

    }

    public function indexbaruAction()
    {

    }

    public function tipeorderAction()
    {

    }

    public function coAction()
    {
        
    }

    public function coterminAction()
    {
        
    }

    public function cononAction()
    {
        
    }

    public function cpeAction()
    {
        
    }

    public function cpeterminAction()
    {
        
    }

    public function cpenonAction()
    {
        
    }

    public function loginAction()
    {
        
    }

    public function registerAction()
    {
        
    }



}