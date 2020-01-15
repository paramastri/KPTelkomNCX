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
        $no_quote = $this->request->getPost('no_quote');
        $tipe_order = $this->request->getPost('tipe_order');
        
        
        $dokumen->nama_cc = $nama_cc;
        $dokumen->nama_pekerjaan = $nama_pekerjaan;
        $dokumen->mitra = $mitra;
        $dokumen->nilai_nrc = $nilai_nrc;
        $dokumen->nilai_mrc = $nilai_mrc;
        $dokumen->status_ncx = $status_ncx;
        $dokumen->no_quote = $no_quote;
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
            $no_agreement_con = $this->request->getPost('no_agreement_con');
            $no_order_con = $this->request->getPost('no_order_con');
            $baso_con = $this->request->getPost('baso_con');
            $jenis_termin_con = $this->request->getPost('jenis_termin_con');
            $billing_nol_con = $this->request->getPost('billing_nol_con');
            $billing_com_con = $this->request->getPost('billing_com_con');
            $asset_con = $this->request->getPost('asset_con');
            $approval_sm_con = $this->request->getPost('approval_sm_con');
            $approval_ubc_con = $this->request->getPost('approval_ubc_con');

            $detail->id_ncx = $id_ncx;
            $detail->no_agreement_con = $no_agreemnet_con;
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
            $no_agreement = $this->request->getPost('no_agreement');
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
            $detail->no_agreement = $no_agreemnet;
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

    public function coAction($id)
    {
        $this->view->data = $id;
        
    }

    public function coterminAction($id)
    {
        $this->view->data = $id;
    }

    public function cononAction()
    {
        
    }

    public function cpeAction($id)
    {
        $this->view->data = $id;
        
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

    public function storeloginAction(){
        $username = $this->request->getPost('username');
        $pass = $this->request->getPost('password');
        // echo $pass;
        // die();
            $user = user::findFirst("username = '$username'");
            // echo $user->password;
            // die();
            if ($user){
                if($this->security->checkHash($pass, $user->password)){
                    $this->session->set(
                        'admin',
                        [
                            'id' => $user->id,
                            'username' => $user->username,
                        ]
                    );

                    (new Response())->redirect('indexbaru')->send();
                }
                else{
                    $this->flashSession->error("Gagal masuk sebagai admin. Silakan cek kembali username dan password anda.");
                    $this->response->redirect('login');
                }
            }
            else{
                $this->flashSession->error("Gagal masuk sebagai admin. Silakan cek kembali username dan password anda.");
                    $this->response->redirect('login');
            }
    }

    public function registerAction()
    {
        
    }

    public function storeregisterAction(){
        $user = new user();
        $user->username = $this->request->getPost('username');
        $password = $this->request->getPost('password');
        $user->password = $this->security->hash($password);
        $usernames = user::findFirst("username = '$user->username'");
        if($usernames){
            $this->flashSession->error("Gagal register. Username telah digunakan.");
            return $this->response->redirect('register');
        }
        else{

            $user->save();
            $this->response->redirect('login');
        }
    }

    public function storeAction()
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
        // $no_agreement = $this->request->getPost('no_agreement');
        $tipe_order = $this->request->getPost('tipe_order');
        
        
        $dokumen->nama_cc = $nama_cc;
        $dokumen->nama_pekerjaan = $nama_pekerjaan;
        $dokumen->mitra = $mitra;
        $dokumen->nilai_nrc = $nilai_nrc;
        $dokumen->nilai_mrc = $nilai_mrc;
        $dokumen->status_ncx = $status_ncx;
        $dokumen->kendala = $kendala;
        $dokumen->no_quote = $no_quote;
        // $dokumen->no_agreement = $no_agreement;
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

        // $data = ncx::findFirst("id='$max'");
        if($tipe_order == 1)
        {
            return $this->response->redirect('co' . '/' . $max);
            // return $this->response->redirect('co');
        }
        elseif($tipe_order == 2)
        {
            // return $this->response->redirect('cpe');
            return $this->response->redirect('cpe' . '/' . $max);

        }
    }

    public function storecoAction()
    {
        $detail = new connectivity();
        $id_ncx = $this->request->getPost('id_ncx');
        $no_agreement_con = $this->request->getPost('no_agreement_con');
        $no_order_con = $this->request->getPost('no_order_con');
        $baso_con = $this->request->getPost('baso_con');
        $jenis_termin_con = $this->request->getPost('jenis_termin_con');
        $kendala1 = $this->request->getPost('kendala1');

        $detail->id_ncx = $id_ncx;
        $detail->no_agreement_con = $no_agreement_con;
        $detail->no_order_con = $no_order_con;
        $detail->baso_con = $baso_con;
        $detail->jenis_termin_con = $jenis_termin_con;
        $detail->save();
        
        if($kendala1)
        {
            $kendala = new kendala();
            $kendala->id_level = $this->request->getPost('1');
            $kendala->id_ncx = $id_ncx;
            $kendala->kendala = $kendala1;
            $kendala->save();
        }

        if($jenis_termin_con == 1)
        {
            return $this->response->redirect('cotermin' . '/' . $id_ncx);
            // return $this->response->redirect('co');
        }
        elseif($jenis_termin_con == 2)
        {
            // return $this->response->redirect('cpe');
            return $this->response->redirect('conon' . '/' . $id_ncx);

        }
    }

    public function storecoterminAction()
    {
        $id_ncx = $this->request->getPost('id_ncx');
        $detail = connectivity::findFirst("id_ncx='$id_ncx'");

        $billing_nol_con = $this->request->getPost('billing_nol_con');
        $asset_con = $this->request->getPost('asset_con');
        $approval_sm_con  = $this->request->getPost('approval_sm_con');
        $approval_ubc_con = $this->request->getPost('approval_ubc_con');
        $billing_com_con = $this->request->getPost('billing_com_con');

        $kendala12 = $this->request->getPost('kendala12');
        $kendala13 = $this->request->getPost('kendala13');
        $kendala14 = $this->request->getPost('kendala14');
        $kendala15 = $this->request->getPost('kendala15');
        $kendala16 = $this->request->getPost('kendala16');

        // $detail->id_ncx = $id_ncx;
        $detail->billing_nol_con = $billing_nol_con;
        $detail->asset_con = $asset_con;
        $detail->approval_sm_con = $approval_sm_con;
        $detail->approval_ubc_con = $approval_ubc_con;
        $detail->billing_com_con = $billing_com_con;
        $detail->save();

        if($kendala12)
        {
            $kendala = new kendala();
            $kendala->id_level = $this->request->getPost('12');
            $kendala->id_ncx = $id_ncx;
            $kendala->kendala = $kendala12;
            $kendala->save();
        }

        if($kendala13)
        {
            $kendala = new kendala();
            $kendala->id_level = $this->request->getPost('13');
            $kendala->id_ncx = $id_ncx;
            $kendala->kendala = $kendala13;
            $kendala->save();
        }

        if($kendala14)
        {
            $kendala = new kendala();
            $kendala->id_level = $this->request->getPost('14');
            $kendala->id_ncx = $id_ncx;
            $kendala->kendala = $kendala14;
            $kendala->save();
        }

        if($kendala15)
        {
            $kendala = new kendala();
            $kendala->id_level = $this->request->getPost('15');
            $kendala->id_ncx = $id_ncx;
            $kendala->kendala = $kendala15;
            $kendala->save();
        }

        if($kendala16)
        {
            $kendala = new kendala();
            $kendala->id_level = $this->request->getPost('16');
            $kendala->id_ncx = $id_ncx;
            $kendala->kendala = $kendala16;
            $kendala->save();
        }

    }


    public function storecpeAction()
    {
        $detail = new cpe();
        $id_ncx = $this->request->getPost('id_ncx');
        $dok_p6 = $this->request->getPost('dok_p6');
        $dok_p8 = $this->request->getPost('dok_p8');
        $dok_kl_wo = $this->request->getPost('dok_kl_wo');
        $no_agreement = $this->request->getPost('no_agreement');
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

        $kendala1 = $this->request->getPost('kendala1');
        $kendala2 = $this->request->getPost('kendala2');
        $kendala3 = $this->request->getPost('kendala3');
        $kendala4 = $this->request->getPost('kendala4');
        $kendala5 = $this->request->getPost('kendala5');
        $kendala6 = $this->request->getPost('kendala6');
        $kendala7 = $this->request->getPost('kendala7');
        $kendala8 = $this->request->getPost('kendala8');
        $kendala9 = $this->request->getPost('kendala9');

        $detail->id_ncx = $id_ncx;
        $detail->dok_p6 = $dok_p6;
        $detail->dok_p8 = $dok_p8;
        $detail->dok_kl_wo = $dok_kl_wo;
        $detail->no_agreement = $no_agreement;
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

        if($kendala1)
        {
            $kendala = new kendala();
            $kendala->id_level = $this->request->getPost('1');
            $kendala->id_ncx = $id_ncx;
            $kendala->kendala = $kendala1;
            $kendala->save();
        }

        if($kendala2)
        {
            $kendala = new kendala();
            $kendala->id_level = $this->request->getPost('2');
            $kendala->id_ncx = $id_ncx;
            $kendala->kendala = $kendala2;
            $kendala->save();
        }

        if($kendala3)
        {
            $kendala = new kendala();
            $kendala->id_level = $this->request->getPost('3');
            $kendala->id_ncx = $id_ncx;
            $kendala->kendala = $kendala3;
            $kendala->save();
        }

        if($kendala4)
        {
            $kendala = new kendala();
            $kendala->id_level = $this->request->getPost('4');
            $kendala->id_ncx = $id_ncx;
            $kendala->kendala = $kendala4;
            $kendala->save();
        }

        if($kendala5)
        {
            $kendala = new kendala();
            $kendala->id_level = $this->request->getPost('5');
            $kendala->id_ncx = $id_ncx;
            $kendala->kendala = $kendala5;
            $kendala->save();
        }

        if($kendala6)
        {
            $kendala = new kendala();
            $kendala->id_level = $this->request->getPost('6');
            $kendala->id_ncx = $id_ncx;
            $kendala->kendala = $kendala6;
            $kendala->save();
        }

        if($kendala7)
        {
            $kendala = new kendala();
            $kendala->id_level = $this->request->getPost('7');
            $kendala->id_ncx = $id_ncx;
            $kendala->kendala = $kendala7;
            $kendala->save();
        }

        if($kendala8)
        {
            $kendala = new kendala();
            $kendala->id_level = $this->request->getPost('8');
            $kendala->id_ncx = $id_ncx;
            $kendala->kendala = $kendala8;
            $kendala->save();
        }

        if($kendala9)
        {
            $kendala = new kendala();
            $kendala->id_level = $this->request->getPost('9');
            $kendala->id_ncx = $id_ncx;
            $kendala->kendala = $kendala9;
            $kendala->save();
        }
    }

}