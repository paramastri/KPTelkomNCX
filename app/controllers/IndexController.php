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

    public function dataAction()
    {

    }


    public function newlistdataAction()
    {
        $listdatas = ncx::find();
        $data = array();
        foreach ($listdatas as $key => $listdata)
        {
            $listdata2 = connectivity::findFirst("id_ncx='$listdata->id'");
            if($listdata2)
            {
                $noorder = $listdata2->no_order_con;
            }
            else
            {
                $listdata3 = cpe::findFirst("id_ncx='$listdata->id'");
                $noorder = $listdata3->no_order;
            }

            $cekkendala = kendala::findFirst([
                "id_ncx='$listdata->id'",
                'order' => 'id_level DESC',
                'limit' => 1,
            ]);

            $ceklevel = level::findFirst("id='$cekkendala->id_level'");

            $data[] = array(
                'id_ncx' => $listdata->id_ncx,
                'nama_cc' => $listdata->nama_cc,
                'nama_pekerjaan' => $listdata->nama_pekerjaan,
                'mitra' => $listdata->mitra,
                'nilai_nrc' => $listdata->nilai_nrc,
                'nilai_mrc' => $listdata->nilai_mrc,
                'status_ncx' => $listdata->status_ncx,
                'no_quote' =>$listdata->no_quote,
                'tipe_order' => $listdata->tipe_order,
                'no_order' => $noorder,
                'link' => $listdata->id,
                'progress' => $ceklevel->nama_level,
                'kendala' => $cekkendala->kendala,
            );
        

        }
        $content = json_encode($data);
        return $this->response->setContent($content);
    }



    public function listdataAction()
    {
        $listdatas = ncx::find();
        // $listdata2 = connectivity::findFirst("id_ncx='$listdata->id'"); // dicari id ncx yg ada di ncx dan yg ada di connectivity
        // $listdata3 = cpe::findFirst("id_ncx='$listdata->id'");
        $data = array();
        foreach ($listdatas as $key => $listdata)
        {
            $listdata2 = connectivity::findFirst("id_ncx='$listdata->id'");
            if($listdata2)
            {
                $noorder = $listdata2->no_order_con;
            }
            else
            {
                $listdata3 = cpe::findFirst("id_ncx='$listdata->id'");
                $noorder = $listdata3->no_order;
            }
            // if($listdata2)
            // {
            //     $noorder = $listdata2->no_order;
            // }
            // if($listdata3)
            // {
            //     $noorder = $listdata3->no_order;
            // }

            $data[$key] = array(
                'id_ncx' => $listdata->id_ncx,
                'nama_cc' => $listdata->nama_cc,
                'nama_pekerjaan' => $listdata->nama_pekerjaan,
                'mitra' => $listdata->mitra,
                'nilai_nrc' => $listdata->nilai_nrc,
                'nilai_mrc' => $listdata->nilai_mrc,
                'status_ncx' => $listdata->status_ncx,
                'no_quote' =>$listdata->no_quote,
                'tipe_order' => $listdata->tipe_order,
                'no_order' => $noorder,
                // 'no_agreement_con' => $listdata2->no_agreement_con,
                // 'no_order_con' => $listdata->no_order_con,
                // 'baso_con' =>$listdata->baso_con,
                // 'jenis_termin_con' =>$listdata->jenis_termin_con,
                // 'billing_nol_con' =>$listdata->billing_nol_con,
                // 'billing_com_con' =>$listdata->billing_com_con,
                // 'asset_con' =>$listdata->asset_con,
                // 'approval_sm_con' =>$listdata->approval_sm_con,
                // 'approval_ubc_con' =>$listdata->approval_ubc_con,
                // 'dok_p6' =>$listdata->dok_p6,
                // 'jenis_surat' => $jenissurat,
                // 'status' => $status,
                // 'verifikasi' => $verifikasi,
                'link' => $listdata->id,
                'progress' => "selesai",
            );

            // jika belum isi tipe order
            if (intval($listdata->tipe_order) < 1) {
                // di cek semua kolomnya, kalo ketemu ada yang kosong langsung isi progress dam lanjut ke loop selanjutnya
                if(empty($listdata->nama_cc)){
                    $data[$key]['progress'] = "belum isi nama";
                    continue;
                }
                else if(empty($listdata->nama_pekerjaan)){
                    $data[$key]['progress'] = "belum isi pekerjaan";
                    continue;
                }
                else if(empty($listdata->mitra)){
                    $data[$key]['progress'] = "belum isi mitra";
                    continue;
                }
                else if(empty($listdata->nilai_nrc)){
                    $data[$key]['progress'] = "belum isi nilai nrc";
                    continue;
                }
                else if(empty($listdata->nilai_mrc)){
                    $data[$key]['progress'] = "belum isi nilai mrc";
                    continue;
                }
                else if(empty($listdata->status_ncx)){
                    $data[$key]['progress'] = "belum isi status ncx";
                    continue;
                }
                else if(empty($listdata->no_quote)){
                    $data[$key]['progress'] = "belum isi no quote";
                    continue;
                }
            }
            // jika tiper ordernya disii, dan nilai nya 1 connectivity
            else if (intval($listdata->tipe_order > 0) && intval($listdata->tipe_order < 2)){
                // query tabel 
                $con_data=  connectivity::findFirst(['conditions' => 'id_ncx = :id:', 'bind' => ["id" => $listdata->id]]);

                // cek semua kolomnya, kalo ketemu ada yang kosong langsung isi progress dam lanjut ke loop selanjutnya
                if(empty($con_data->no_agreement_con)){
                    $data[$key]['progress'] = "belum isi no agreement";
                    continue;
                }
                else if(empty($con_data->no_order_con)){
                    $data[$key]['progress'] = "belum isi no order con";
                    continue;
                }
                else if(empty($con_data->baso_con)){
                    $data[$key]['progress'] = "belum isi baso";
                    continue;
                }
                else if(empty($con_data->jenis_termin_con)){
                    $data[$key]['progress'] = "belum isi jenis termin";
                    continue;
                }
                else if(intval($con_data->jenis_termin_con) > 0 && intval($con_data->jenis_termin_con) < 2){
                    if(empty($con_data->billing_nol_con)){
                        $data[$key]['progress'] = "belum isi billing nol";
                        continue;
                    }
                    
                    else if(empty($con_data->approval_sm_con)){
                        $data[$key]['progress'] = "belum isi approval sm";
                        continue;
                    }
                    else if(empty($con_data->approval_ubc_con)){
                        $data[$key]['progress'] = "belum isi approval ubc";
                        continue;
                    }
                    else if(empty($con_data->billing_com_con)){
                        $data[$key]['progress'] = "belum isi billing com";
                        continue;
                    }
                }
                else if(intval($con_data->jenis_termin_con) > 1 && intval($con_data->jenis_termin_con) < 3){
                    if(empty($con_data->billing_com_con)){
                        $data[$key]['progress'] = "belum isi billing com";
                        continue;
                    }
                }
                

            }
            // jika tiper ordernya disii, dan nilai nya 2 cpe
            else if (intval($listdata->tipe_order > 1) && intval($listdata->tipe_order < 3)){
                // query tabel
                $con_data=  cpe::findFirst(['conditions' => 'id_ncx = :id:', 'bind' => ["id" => $listdata->id]]);

                // cek semua kolomnya, kalo ketemu ada yang kosong langsung isi progress dam lanjut ke loop selanjutnya
                if(empty($con_data->dok_p6)){
                    $data[$key]['progress'] = "belum isi dokumen p6";
                    continue;
                }
                else if(empty($con_data->dok_p8)){
                    $data[$key]['progress'] = "belum isi dokumen p8";
                    continue;
                }
                else if(empty($con_data->dok_kl_wo)){
                    $data[$key]['progress'] = "belum isi dokumen kl/wo";
                    continue;
                }
                else if(empty($con_data->no_agreement)){
                    $data[$key]['progress'] = "belum isi no agreement";
                    continue;
                }
                else if(empty($con_data->approval_sm_crm)){
                    $data[$key]['progress'] = "belum isi dokumen sm/crm";
                    continue;
                }
                else if(empty($con_data->no_order)){
                    $data[$key]['progress'] = "belum isi no order";
                    continue;
                }
                else if(empty($con_data->wfm_mitra)){
                    $data[$key]['progress'] = "belum isi wfm mitra";
                    continue;
                }
                else if(empty($con_data->approval_wfm)){
                    $data[$key]['progress'] = "belum isi approval wfm";
                    continue;
                }
                else if(empty($con_data->status_nde)){
                    $data[$key]['progress'] = "belum isi status nde";
                    continue;
                }
                else if(empty($con_data->approval_des)){
                    $data[$key]['progress'] = "belum isi approval des";
                    continue;
                }
                else if(empty($con_data->baso)){
                    $data[$key]['progress'] = "belum isi baso";
                    continue;
                }
                else if(empty($con_data->jenis_termin)){
                    $data[$key]['progress'] = "belum isi jenis termin";
                    continue;
                }
                else if(intval($con_data->jenis_termin) > 0 && intval($con_data->jenis_termin) < 2){
                    if(empty($con_data->billing_nol)){
                        $data[$key]['progress'] = "belum isi billing nol";
                        continue;
                    }
                    else if(empty($con_data->asset)){
                        $data[$key]['progress'] = "belum isi asset";
                        continue;
                    }
                    else if(empty($con_data->approval_sm)){
                        $data[$key]['progress'] = "belum isi approval sm";
                        continue;
                    }
                    else if(empty($con_data->approval_ubc)){
                        $data[$key]['progress'] = "belum isi approval ubc";
                        continue;
                    }
                    else if(empty($con_data->billing_com)){
                        $data[$key]['progress'] = "belum isi billing complete";
                        continue;
                    }
                }
                else if(intval($con_data->jenis_termin) > 1 && intval($con_data->jenis_termin) < 3){
                    if(empty($con_data->billing_com)){
                        $data[$key]['progress'] = "belum isi billing complete";
                        continue;
                    }
                }
            }
        }

        // $max = kendala::maximum(
        //     [
        //         'column' => 'id',
        //     ]
        // );

        // // echo $max->id_level;
        // // die();

        // $level = $max->id_level;
        // $nama_level = level::findFirst("id='$level'");
        
        $content = json_encode($data);
        return $this->response->setContent($content);

    }

    public function listAction()
    {

    }


    public function detailAction($id)
    {
        $listdata = ncx::findFirst("id='$id'");
        $listdata2 = connectivity::findFirst("id_ncx='$id'");
        $listdata3 = cpe::findFirst("id_ncx='$id'");
        $this->view->data = $listdata;
        if($listdata2)
        {
            $this->view->dataco = $listdata2;        
        }
        elseif($listdata3)
        {
            $this->view->datacpe = $listdata3;

        }

        $kendala1 = kendala::findFirst([
            'id_ncx = :id_ncx: AND id_level = :id_level:',
            'bind' => [
                'id_ncx' => $id,
                'id_level' => '1',
            ]
        ]);
        $this->view->kendala1 = $kendala1;

        $kendala2 = kendala::findFirst([
            'id_ncx = :id_ncx: AND id_level = :id_level:',
            'bind' => [
                'id_ncx' => $id,
                'id_level' => '2',
            ]
        ]);
        $this->view->kendala2 = $kendala2;

        $kendala3 = kendala::findFirst([
            'id_ncx = :id_ncx: AND id_level = :id_level:',
            'bind' => [
                'id_ncx' => $id,
                'id_level' => '3',
            ]
        ]);
        $this->view->kendala3 = $kendala3;

        $kendala4 = kendala::findFirst([
            'id_ncx = :id_ncx: AND id_level = :id_level:',
            'bind' => [
                'id_ncx' => $id,
                'id_level' => '4',
            ]
        ]);
        $this->view->kendala4 = $kendala4;

        $kendala5 = kendala::findFirst([
            'id_ncx = :id_ncx: AND id_level = :id_level:',
            'bind' => [
                'id_ncx' => $id,
                'id_level' => '5',
            ]
        ]);
        $this->view->kendala5 = $kendala5;

        $kendala6 = kendala::findFirst([
            'id_ncx = :id_ncx: AND id_level = :id_level:',
            'bind' => [
                'id_ncx' => $id,
                'id_level' => '6',
            ]
        ]);
        $this->view->kendala6 = $kendala6;

        $kendala7 = kendala::findFirst([
            'id_ncx = :id_ncx: AND id_level = :id_level:',
            'bind' => [
                'id_ncx' => $id,
                'id_level' => '7',
            ]
        ]);
        $this->view->kendala7 = $kendala7;

        $kendala8 = kendala::findFirst([
            'id_ncx = :id_ncx: AND id_level = :id_level:',
            'bind' => [
                'id_ncx' => $id,
                'id_level' => '8',
            ]
        ]);
        $this->view->kendala8 = $kendala8;

        $kendala9 = kendala::findFirst([
            'id_ncx = :id_ncx: AND id_level = :id_level:',
            'bind' => [
                'id_ncx' => $id,
                'id_level' => '9',
            ]
        ]);
        $this->view->kendala9 = $kendala9;

        $kendala10 = kendala::findFirst([
            'id_ncx = :id_ncx: AND id_level = :id_level:',
            'bind' => [
                'id_ncx' => $id,
                'id_level' => '10',
            ]
        ]);
        $this->view->kendala10 = $kendala10;

        $kendala11 = kendala::findFirst([
            'id_ncx = :id_ncx: AND id_level = :id_level:',
            'bind' => [
                'id_ncx' => $id,
                'id_level' => '11',
            ]
        ]);
        $this->view->kendala11 = $kendala11;

        $kendala12 = kendala::findFirst([
            'id_ncx = :id_ncx: AND id_level = :id_level:',
            'bind' => [
                'id_ncx' => $id,
                'id_level' => '12',
            ]
        ]);
        $this->view->kendala12 = $kendala12;

        $kendala13 = kendala::findFirst([
            'id_ncx = :id_ncx: AND id_level = :id_level:',
            'bind' => [
                'id_ncx' => $id,
                'id_level' => '13',
            ]
        ]);
        $this->view->kendala13 = $kendala13;

    }

    public function detailtipeAction($id)
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

    public function cononAction($id)
    {
        $this->view->data = $id;
    }

    public function cpeAction($id)
    {
        $this->view->data = $id;
        
    }

    public function cpeterminAction($id)
    {
        $this->view->data = $id;
    }

    public function cpenonAction($id)
    {
        $this->view->data = $id;
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

    public function logoutAction()
    {
        $this->session->destroy();
        $this->response->redirect('login');
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
        else{
            return $this->response->redirect('data');
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
        $kendala9 = $this->request->getPost('kendala9');

        $detail->id_ncx = $id_ncx;
        $detail->no_agreement_con = $no_agreement_con;
        $detail->no_order_con = $no_order_con;
        $detail->baso_con = $baso_con;
        $detail->jenis_termin_con = $jenis_termin_con;
        $detail->save();
        
        if($kendala9)
        {
            $kendala = new kendala();
            $kendala->id_level = $this->request->getPost('9');
            $kendala->id_ncx = $id_ncx;
            $kendala->kendala = $kendala9;
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
        else{
            return $this->response->redirect('data');
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

        $kendala10 = $this->request->getPost('kendala10');
        $kendala11 = $this->request->getPost('kendala11');
        $kendala12 = $this->request->getPost('kendala12');
        $kendala13 = $this->request->getPost('kendala13');

        // $detail->id_ncx = $id_ncx;
        $detail->billing_nol_con = $billing_nol_con;
        $detail->asset_con = $asset_con;
        $detail->approval_sm_con = $approval_sm_con;
        $detail->approval_ubc_con = $approval_ubc_con;
        $detail->billing_com_con = $billing_com_con;
        $detail->save();

        if($kendala10)
        {
            $kendala = new kendala();
            $kendala->id_level = $this->request->getPost('10');
            $kendala->id_ncx = $id_ncx;
            $kendala->kendala = $kendala10;
            $kendala->save();
        }

        if($kendala11)
        {
            $kendala = new kendala();
            $kendala->id_level = $this->request->getPost('11');
            $kendala->id_ncx = $id_ncx;
            $kendala->kendala = $kendala11;
            $kendala->save();
        }

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

    }

    public function storecononAction()
    {
        // $detail = new connectivity();
        // $id_ncx = $this->request->getPost('id_ncx');

        $id_ncx = $this->request->getPost('id_ncx');
        $detail = connectivity::findFirst("id_ncx='$id_ncx'");
        // echo $id_ncx; die();
        $billing_com_con = $this->request->getPost('billing_com_con');

        $detail->billing_com_con = $billing_com_con;
        $detail->save();
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
// var_dump($detail); die();
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

        if($jenis_termin == 1)
        {
            return $this->response->redirect('cpetermin' . '/' . $id_ncx);
            // return $this->response->redirect('co');
        }
        elseif($jenis_termin == 2)
        {
            // return $this->response->redirect('cpe');
            return $this->response->redirect('cpenon' . '/' . $id_ncx);

        }
        else{
            return $this->response->redirect('data');
        }
    }

    public function storecpeterminAction()
    {
        $id_ncx = $this->request->getPost('id_ncx');
        $detail = cpe::findFirst("id_ncx='$id_ncx'");

        $billing_nol = $this->request->getPost('billing_nol');
        $asset = $this->request->getPost('asset');
        $approval_sm = $this->request->getPost('approval_sm');
        $approval_ubc = $this->request->getPost('approval_ubc');
        $billing_com = $this->request->getPost('billing_com');

        $kendala12 = $this->request->getPost('kendala12');
        $kendala13 = $this->request->getPost('kendala13');
        $kendala14 = $this->request->getPost('kendala14');
        $kendala15 = $this->request->getPost('kendala15');
        $kendala16 = $this->request->getPost('kendala16');

        $detail->billing_nol = $billing_nol;
        $detail->asset = $asset;
        $detail->approval_sm = $approval_sm;
        $detail->approval_ubc = $approval_ubc;
        $detail->billing_com = $billing_com;
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

    public function storecpenonAction()
    {
        $id_ncx = $this->request->getPost('id_ncx');
        $detail = cpe::findFirst("id_ncx='$id_ncx'");
        // echo $id_ncx; die();

        $billing_com = $this->request->getPost('billing_com');

        $detail->billing_com = $billing_com;
        $detail->save();
    }

    public function editAction($id)
    {
        $data = ncx::findFirst("id='$id'");
        $this->view->data = $data;
        $dataco = connectivity::findFirst("id_ncx='$id'");
        $this->view->dataco = $dataco;
        $datacpe = cpe::findFirst("id_ncx='$id'");
        $this->view->datacpe = $datacpe;
        
    }

    public function storeeditAction()
    {
        $id = $this->request->getPost('id');
        $dokumen = ncx::findFirst("id='$id'");
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

        if($tipe_order == 1)
        {
            $cek = connectivity::findFirst("id_ncx='$id'");
            if($cek)
            {
                return $this->response->redirect('editco' . '/' . $id);
            }
            else{
                return $this->response->redirect('co' . '/' . $id);
            }
            
        }
        elseif($tipe_order == 2)
        {
            $cek = cpe::findFirst("id_ncx='$id'");
            if($cek)
            {
                return $this->response->redirect('editcpe' . '/' . $id);
            }
            else{
                return $this->response->redirect('cpe' . '/' . $id);
            }
            

        }
    }

    public function editcoAction($id)
    {
        $dataumum = ncx::findFirst("id='$id'");
        $data = connectivity::findFirst("id_ncx='$id'");
        $this->view->data = $data;
        $this->view->dataumum = $dataumum;
        $kendala9 = kendala::findFirst([
            'id_ncx = :id_ncx: AND id_level = :id_level:',
            'bind' => [
                'id_ncx' => $id,
                'id_level' => '9',
            ]
        ]);
        $this->view->kendala9 = $kendala9;
        
    }

    public function storeeditcoAction()
    {
        
        $id_ncx = $this->request->getPost('id_ncx');
        $detail = connectivity::findFirst("id_ncx='$id_ncx'");
        $no_agreement_con = $this->request->getPost('no_agreement_con');
        $no_order_con = $this->request->getPost('no_order_con');
        $baso_con = $this->request->getPost('baso_con');
        $jenis_termin_con = $this->request->getPost('jenis_termin_con');
        $kendala9 = $this->request->getPost('kendala9');

        $detail->id_ncx = $id_ncx;
        $detail->no_agreement_con = $no_agreement_con;
        $detail->no_order_con = $no_order_con;
        $detail->baso_con = $baso_con;
        $detail->jenis_termin_con = $jenis_termin_con;
        $detail->save();
        
        if($kendala9)
        {
            $kendala = kendala::findFirst([
                'id_ncx = :id_ncx: AND id_level = :id_level:',
                'bind' => [
                    'id_ncx' => $id_ncx,
                    'id_level' => '9',
                ]
            ]);

            if($kendala)
            {
                $kendala->kendala = $kendala9;
                $kendala->save();

            }
            else{
                $newkendala = new kendala();
                $newkendala->id_level = $this->request->getPost('9');
                $newkendala->id_ncx = $id_ncx;
                $newkendala->kendala = $kendala9;
                $newkendala->save();
            }
        }

        if($jenis_termin_con == 1)
        {
            return $this->response->redirect('editcotermin' . '/' . $id_ncx);
            // return $this->response->redirect('co');
        }
        elseif($jenis_termin_con == 2)
        {
            // return $this->response->redirect('cpe');
            return $this->response->redirect('editconon' . '/' . $id_ncx);

        }
        else{
            return $this->response->redirect('data');
        }
    }

    public function editcononAction($id)
    {
        $dataumum = ncx::findFirst("id='$id'");
        $data = connectivity::findFirst("id_ncx='$id'");
        $this->view->data = $data;
        $this->view->dataumum = $dataumum;
        
    }

    public function storeeditcononAction()
    {
        
        $id_ncx = $this->request->getPost('id_ncx');
        $detail = connectivity::findFirst("id_ncx='$id_ncx'");
        $billing_com_con = $this->request->getPost('billing_com_con');

        $detail->billing_com_con = $billing_com_con;
        $detail->save();
        
        return $this->response->redirect('data');
    }

    public function editcoterminAction($id)
    {
        $dataumum = ncx::findFirst("id='$id'");
        $data = connectivity::findFirst("id_ncx='$id'");
        $this->view->data = $data;
        $this->view->dataumum = $dataumum;
        $kendala10 = kendala::findFirst([
            'id_ncx = :id_ncx: AND id_level = :id_level:',
            'bind' => [
                'id_ncx' => $id,
                'id_level' => '10',
            ]
        ]);
        $this->view->kendala10 = $kendala10;

        $kendala11 = kendala::findFirst([
            'id_ncx = :id_ncx: AND id_level = :id_level:',
            'bind' => [
                'id_ncx' => $id,
                'id_level' => '11',
            ]
        ]);
        $this->view->kendala11 = $kendala11;

        $kendala12 = kendala::findFirst([
            'id_ncx = :id_ncx: AND id_level = :id_level:',
            'bind' => [
                'id_ncx' => $id,
                'id_level' => '12',
            ]
        ]);
        $this->view->kendala12 = $kendala12;

        $kendala13 = kendala::findFirst([
            'id_ncx = :id_ncx: AND id_level = :id_level:',
            'bind' => [
                'id_ncx' => $id,
                'id_level' => '13',
            ]
        ]);
        $this->view->kendala13 = $kendala13;
        
    }

    public function storeeditcoterminAction()
    {
        
        $id_ncx = $this->request->getPost('id_ncx');
        $detail = connectivity::findFirst("id_ncx='$id_ncx'");

        $billing_nol_con = $this->request->getPost('billing_nol_con');
        $asset_con = $this->request->getPost('asset_con');
        $approval_sm_con  = $this->request->getPost('approval_sm_con');
        $approval_ubc_con = $this->request->getPost('approval_ubc_con');
        $billing_com_con = $this->request->getPost('billing_com_con');

        $kendala10 = $this->request->getPost('kendala10');
        $kendala11 = $this->request->getPost('kendala11');
        $kendala12 = $this->request->getPost('kendala12');
        $kendala13 = $this->request->getPost('kendala13');

        // $detail->id_ncx = $id_ncx;
        $detail->billing_nol_con = $billing_nol_con;
        $detail->asset_con = $asset_con;
        $detail->approval_sm_con = $approval_sm_con;
        $detail->approval_ubc_con = $approval_ubc_con;
        $detail->billing_com_con = $billing_com_con;
        $detail->save();
        
        if($kendala10)
        {
            $kendala = kendala::findFirst([
                'id_ncx = :id_ncx: AND id_level = :id_level:',
                'bind' => [
                    'id_ncx' => $id_ncx,
                    'id_level' => '10',
                ]
            ]);

            if($kendala)
            {
                $kendala->kendala = $kendala10;
                $kendala->save();

            }
            else{
                $newkendala = new kendala();
                $newkendala->id_level = $this->request->getPost('10');
                $newkendala->id_ncx = $id_ncx;
                $newkendala->kendala = $kendala10;
                $newkendala->save();
            }
        }

        if($kendala11)
        {
            $kendala = kendala::findFirst([
                'id_ncx = :id_ncx: AND id_level = :id_level:',
                'bind' => [
                    'id_ncx' => $id_ncx,
                    'id_level' => '11',
                ]
            ]);

            if($kendala)
            {
                $kendala->kendala = $kendala11;
                $kendala->save();

            }
            else{
                $newkendala = new kendala();
                $newkendala->id_level = $this->request->getPost('11');
                $newkendala->id_ncx = $id_ncx;
                $newkendala->kendala = $kendala11;
                $newkendala->save();
            }
        }

        if($kendala12)
        {
            $kendala = kendala::findFirst([
                'id_ncx = :id_ncx: AND id_level = :id_level:',
                'bind' => [
                    'id_ncx' => $id_ncx,
                    'id_level' => '12',
                ]
            ]);

            if($kendala)
            {
                $kendala->kendala = $kendala12;
                $kendala->save();

            }
            else{
                $newkendala = new kendala();
                $newkendala->id_level = $this->request->getPost('12');
                $newkendala->id_ncx = $id_ncx;
                $newkendala->kendala = $kendala12;
                $newkendala->save();
            }
        }

        if($kendala13)
        {
            $kendala = kendala::findFirst([
                'id_ncx = :id_ncx: AND id_level = :id_level:',
                'bind' => [
                    'id_ncx' => $id_ncx,
                    'id_level' => '13',
                ]
            ]);

            if($kendala)
            {
                $kendala->kendala = $kendala13;
                $kendala->save();

            }
            else{
                $newkendala = new kendala();
                $newkendala->id_level = $this->request->getPost('13');
                $newkendala->id_ncx = $id_ncx;
                $newkendala->kendala = $kendala13;
                $newkendala->save();
            }
        }

        return $this->response->redirect('data');
    }

    public function editcpeAction($id)
    {
        $dataumum = ncx::findFirst("id='$id'");
        $data = cpe::findFirst("id_ncx='$id'");
        $this->view->data = $data;
        $this->view->dataumum = $dataumum;
        $kendala1 = kendala::findFirst([
            'id_ncx = :id_ncx: AND id_level = :id_level:',
            'bind' => [
                'id_ncx' => $id,
                'id_level' => '1',
            ]
        ]);
        $this->view->kendala1 = $kendala1;

        $kendala2 = kendala::findFirst([
            'id_ncx = :id_ncx: AND id_level = :id_level:',
            'bind' => [
                'id_ncx' => $id,
                'id_level' => '2',
            ]
        ]);
        $this->view->kendala2 = $kendala2;

        $kendala3 = kendala::findFirst([
            'id_ncx = :id_ncx: AND id_level = :id_level:',
            'bind' => [
                'id_ncx' => $id,
                'id_level' => '3',
            ]
        ]);
        $this->view->kendala3 = $kendala3;

        $kendala4 = kendala::findFirst([
            'id_ncx = :id_ncx: AND id_level = :id_level:',
            'bind' => [
                'id_ncx' => $id,
                'id_level' => '4',
            ]
        ]);
        $this->view->kendala4 = $kendala4;

        $kendala5 = kendala::findFirst([
            'id_ncx = :id_ncx: AND id_level = :id_level:',
            'bind' => [
                'id_ncx' => $id,
                'id_level' => '5',
            ]
        ]);
        $this->view->kendala5 = $kendala5;

        $kendala6 = kendala::findFirst([
            'id_ncx = :id_ncx: AND id_level = :id_level:',
            'bind' => [
                'id_ncx' => $id,
                'id_level' => '6',
            ]
        ]);
        $this->view->kendala6 = $kendala6;

        $kendala7 = kendala::findFirst([
            'id_ncx = :id_ncx: AND id_level = :id_level:',
            'bind' => [
                'id_ncx' => $id,
                'id_level' => '7',
            ]
        ]);
        $this->view->kendala7 = $kendala7;

        $kendala8 = kendala::findFirst([
            'id_ncx = :id_ncx: AND id_level = :id_level:',
            'bind' => [
                'id_ncx' => $id,
                'id_level' => '8',
            ]
        ]);
        $this->view->kendala8 = $kendala8;

        $kendala9 = kendala::findFirst([
            'id_ncx = :id_ncx: AND id_level = :id_level:',
            'bind' => [
                'id_ncx' => $id,
                'id_level' => '9',
            ]
        ]);
        $this->view->kendala9 = $kendala9;
        
    }

    public function storeeditcpeAction()
    {
        $id_ncx = $this->request->getPost('id_ncx');
        $detail = cpe::findFirst("id_ncx='$id_ncx'");
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
// var_dump($detail); die();
        $detail->save();

        if($kendala1)
        {
            $kendala = kendala::findFirst([
                'id_ncx = :id_ncx: AND id_level = :id_level:',
                'bind' => [
                    'id_ncx' => $id_ncx,
                    'id_level' => '1',
                ]
            ]);

            if($kendala)
            {
                $kendala->kendala = $kendala1;
                $kendala->save();

            }
            else{
                $newkendala = new kendala();
                $newkendala->id_level = $this->request->getPost('1');
                $newkendala->id_ncx = $id_ncx;
                $newkendala->kendala = $kendala1;
                $newkendala->save();
            }

        }

        if($kendala2)
        {
            $kendala = kendala::findFirst([
                'id_ncx = :id_ncx: AND id_level = :id_level:',
                'bind' => [
                    'id_ncx' => $id_ncx,
                    'id_level' => '2',
                ]
            ]);

            if($kendala)
            {
                $kendala->kendala = $kendala2;
                $kendala->save();

            }
            else{
                $newkendala = new kendala();
                $newkendala->id_level = $this->request->getPost('2');
                $newkendala->id_ncx = $id_ncx;
                $newkendala->kendala = $kendala2;
                $newkendala->save();
            }

        }

        if($kendala3)
        {
            $kendala = kendala::findFirst([
                'id_ncx = :id_ncx: AND id_level = :id_level:',
                'bind' => [
                    'id_ncx' => $id_ncx,
                    'id_level' => '3',
                ]
            ]);

            if($kendala)
            {
                $kendala->kendala = $kendala3;
                $kendala->save();

            }
            else{
                $newkendala = new kendala();
                $newkendala->id_level = $this->request->getPost('3');
                $newkendala->id_ncx = $id_ncx;
                $newkendala->kendala = $kendala3;
                $newkendala->save();
            }

        }

        if($kendala4)
        {
            $kendala = kendala::findFirst([
                'id_ncx = :id_ncx: AND id_level = :id_level:',
                'bind' => [
                    'id_ncx' => $id_ncx,
                    'id_level' => '4',
                ]
            ]);

            if($kendala)
            {
                $kendala->kendala = $kendala4;
                $kendala->save();

            }
            else{
                $newkendala = new kendala();
                $newkendala->id_level = $this->request->getPost('4');
                $newkendala->id_ncx = $id_ncx;
                $newkendala->kendala = $kendala4;
                $newkendala->save();
            }

        }

        if($kendala5)
        {
            $kendala = kendala::findFirst([
                'id_ncx = :id_ncx: AND id_level = :id_level:',
                'bind' => [
                    'id_ncx' => $id_ncx,
                    'id_level' => '5',
                ]
            ]);

            if($kendala)
            {
                $kendala->kendala = $kendala5;
                $kendala->save();

            }
            else{
                $newkendala = new kendala();
                $newkendala->id_level = $this->request->getPost('5');
                $newkendala->id_ncx = $id_ncx;
                $newkendala->kendala = $kendala5;
                $newkendala->save();
            }

        }

        if($kendala6)
        {
            $kendala = kendala::findFirst([
                'id_ncx = :id_ncx: AND id_level = :id_level:',
                'bind' => [
                    'id_ncx' => $id_ncx,
                    'id_level' => '6',
                ]
            ]);

            if($kendala)
            {
                $kendala->kendala = $kendala6;
                $kendala->save();

            }
            else{
                $newkendala = new kendala();
                $newkendala->id_level = $this->request->getPost('6');
                $newkendala->id_ncx = $id_ncx;
                $newkendala->kendala = $kendala6;
                $newkendala->save();
            }

        }

        if($kendala7)
        {
            $kendala = kendala::findFirst([
                'id_ncx = :id_ncx: AND id_level = :id_level:',
                'bind' => [
                    'id_ncx' => $id_ncx,
                    'id_level' => '7',
                ]
            ]);

            if($kendala)
            {
                $kendala->kendala = $kendala7;
                $kendala->save();

            }
            else{
                $newkendala = new kendala();
                $newkendala->id_level = $this->request->getPost('7');
                $newkendala->id_ncx = $id_ncx;
                $newkendala->kendala = $kendala7;
                $newkendala->save();
            }

        }

        if($kendala8)
        {
            $kendala = kendala::findFirst([
                'id_ncx = :id_ncx: AND id_level = :id_level:',
                'bind' => [
                    'id_ncx' => $id_ncx,
                    'id_level' => '8',
                ]
            ]);

            if($kendala)
            {
                $kendala->kendala = $kendala8;
                $kendala->save();

            }
            else{
                $newkendala = new kendala();
                $newkendala->id_level = $this->request->getPost('8');
                $newkendala->id_ncx = $id_ncx;
                $newkendala->kendala = $kendala8;
                $newkendala->save();
            }

        }

        if($kendala9)
        {
            $kendala = kendala::findFirst([
                'id_ncx = :id_ncx: AND id_level = :id_level:',
                'bind' => [
                    'id_ncx' => $id_ncx,
                    'id_level' => '9',
                ]
            ]);

            if($kendala)
            {
                $kendala->kendala = $kendala9;
                $kendala->save();

            }
            else{
                $newkendala = new kendala();
                $newkendala->id_level = $this->request->getPost('9');
                $newkendala->id_ncx = $id_ncx;
                $newkendala->kendala = $kendala9;
                $newkendala->save();
            }

        }

        if($jenis_termin == 1)
        {
            return $this->response->redirect('editcpetermin' . '/' . $id_ncx);
            // return $this->response->redirect('co');
        }
        elseif($jenis_termin == 2)
        {
            // return $this->response->redirect('cpe');
            return $this->response->redirect('editcpenon' . '/' . $id_ncx);

        }
        else{
            return $this->response->redirect('data');
        }
    }

    public function editcpenonAction($id)
    {
        $dataumum = ncx::findFirst("id='$id'");
        $data = cpe::findFirst("id_ncx='$id'");
        $this->view->data = $data;
        $this->view->dataumum = $dataumum;
        
    }

    public function storeeditcpenonAction()
    {
        $id_ncx = $this->request->getPost('id_ncx');
        $detail = cpe::findFirst("id_ncx='$id_ncx'");
        $billing_com = $this->request->getPost('billing_com');

        $detail->billing_com = $billing_com;
        $detail->save();
        
        return $this->response->redirect('data');
    }

    public function editcpeterminAction($id)
    {
        $dataumum = ncx::findFirst("id='$id'");
        $data = cpe::findFirst("id_ncx='$id'");
        $this->view->data = $data;
        $this->view->dataumum = $dataumum;
        $kendala10 = kendala::findFirst([
            'id_ncx = :id_ncx: AND id_level = :id_level:',
            'bind' => [
                'id_ncx' => $id,
                'id_level' => '10',
            ]
        ]);
        $this->view->kendala10 = $kendala10;

        $kendala11 = kendala::findFirst([
            'id_ncx = :id_ncx: AND id_level = :id_level:',
            'bind' => [
                'id_ncx' => $id,
                'id_level' => '11',
            ]
        ]);
        $this->view->kendala11 = $kendala11;

        $kendala12 = kendala::findFirst([
            'id_ncx = :id_ncx: AND id_level = :id_level:',
            'bind' => [
                'id_ncx' => $id,
                'id_level' => '12',
            ]
        ]);
        $this->view->kendala12 = $kendala12;

        $kendala13 = kendala::findFirst([
            'id_ncx = :id_ncx: AND id_level = :id_level:',
            'bind' => [
                'id_ncx' => $id,
                'id_level' => '13',
            ]
        ]);
        $this->view->kendala13 = $kendala13;
        
    }

    public function storeeditcpeterminAction()
    {
        
        $id_ncx = $this->request->getPost('id_ncx');
        $detail = cpe::findFirst("id_ncx='$id_ncx'");

        $billing_nol = $this->request->getPost('billing_nol');
        $asset = $this->request->getPost('asset');
        $approval_sm  = $this->request->getPost('approval_sm');
        $approval_ubc = $this->request->getPost('approval_ubc');
        $billing_com = $this->request->getPost('billing_com');

        $kendala10 = $this->request->getPost('kendala10');
        $kendala11 = $this->request->getPost('kendala11');
        $kendala12 = $this->request->getPost('kendala12');
        $kendala13 = $this->request->getPost('kendala13');

        // $detail->id_ncx = $id_ncx;
        $detail->billing_nol = $billing_nol;
        $detail->asset = $asset;
        $detail->approval_sm = $approval_sm;
        $detail->approval_ubc = $approval_ubc;
        $detail->billing_com = $billing_com;
        $detail->save();
        
        if($kendala10)
        {
            $kendala = kendala::findFirst([
                'id_ncx = :id_ncx: AND id_level = :id_level:',
                'bind' => [
                    'id_ncx' => $id_ncx,
                    'id_level' => '10',
                ]
            ]);

            if($kendala)
            {
                $kendala->kendala = $kendala10;
                $kendala->save();

            }
            else{
                $newkendala = new kendala();
                $newkendala->id_level = $this->request->getPost('10');
                $newkendala->id_ncx = $id_ncx;
                $newkendala->kendala = $kendala10;
                $newkendala->save();
            }
        }

        if($kendala11)
        {
            $kendala = kendala::findFirst([
                'id_ncx = :id_ncx: AND id_level = :id_level:',
                'bind' => [
                    'id_ncx' => $id_ncx,
                    'id_level' => '11',
                ]
            ]);

            if($kendala)
            {
                $kendala->kendala = $kendala11;
                $kendala->save();

            }
            else{
                $newkendala = new kendala();
                $newkendala->id_level = $this->request->getPost('11');
                $newkendala->id_ncx = $id_ncx;
                $newkendala->kendala = $kendala11;
                $newkendala->save();
            }
        }

        if($kendala12)
        {
            $kendala = kendala::findFirst([
                'id_ncx = :id_ncx: AND id_level = :id_level:',
                'bind' => [
                    'id_ncx' => $id_ncx,
                    'id_level' => '12',
                ]
            ]);

            if($kendala)
            {
                $kendala->kendala = $kendala12;
                $kendala->save();

            }
            else{
                $newkendala = new kendala();
                $newkendala->id_level = $this->request->getPost('12');
                $newkendala->id_ncx = $id_ncx;
                $newkendala->kendala = $kendala12;
                $newkendala->save();
            }
        }

        if($kendala13)
        {
            $kendala = kendala::findFirst([
                'id_ncx = :id_ncx: AND id_level = :id_level:',
                'bind' => [
                    'id_ncx' => $id_ncx,
                    'id_level' => '13',
                ]
            ]);

            if($kendala)
            {
                $kendala->kendala = $kendala13;
                $kendala->save();

            }
            else{
                $newkendala = new kendala();
                $newkendala->id_level = $this->request->getPost('13');
                $newkendala->id_ncx = $id_ncx;
                $newkendala->kendala = $kendala13;
                $newkendala->save();
            }
        }

        return $this->response->redirect('data');
    }

    public function addseqAction()
    {
        
    }

    public function editseqcoAction($id)
    {
        $dataumum = ncx::findFirst("id='$id'");
        $data = connectivity::findFirst("id_ncx='$id'");
        $this->view->data = $data;
        $this->view->dataumum = $dataumum;
       

        $kendala12 = kendala::findFirst([
            'id_ncx = :id_ncx: AND id_level = :id_level:',
            'bind' => [
                'id_ncx' => $id,
                'id_level' => '12',
            ]
        ]);
        $this->view->kendala12 = $kendala12;

        $kendala13 = kendala::findFirst([
            'id_ncx = :id_ncx: AND id_level = :id_level:',
            'bind' => [
                'id_ncx' => $id,
                'id_level' => '13',
            ]
        ]);
        $this->view->kendala13 = $kendala13;
        
    }

    public function editseqcpeAction($id)
    {
        $dataumum = ncx::findFirst("id='$id'");
        $data = cpe::findFirst("id_ncx='$id'");
        $this->view->data = $data;
        $this->view->dataumum = $dataumum;
        

        $kendala12 = kendala::findFirst([
            'id_ncx = :id_ncx: AND id_level = :id_level:',
            'bind' => [
                'id_ncx' => $id,
                'id_level' => '12',
            ]
        ]);
        $this->view->kendala12 = $kendala12;

        $kendala13 = kendala::findFirst([
            'id_ncx = :id_ncx: AND id_level = :id_level:',
            'bind' => [
                'id_ncx' => $id,
                'id_level' => '13',
            ]
        ]);
        $this->view->kendala13 = $kendala13;
        
    }

}