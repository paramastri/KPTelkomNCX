<?php

use Phalcon\Mvc\Controller;
use Phalcon\Http\Response;
use Phalcon\Mvc\Dispatcher;
use App\Validation\FileValidation;

class DokumenController extends Controller
{
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

    public function listdatauserAction()
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

        $kendala12s = kendala::find([
            'id_ncx = :id_ncx: AND id_level = :id_level:',
            'bind' => [
                'id_ncx' => $id,
                'id_level' => '12',
            ]
        ]);
        $this->view->kendala12s = $kendala12s;

        $kendala13s = kendala::find([
            'id_ncx = :id_ncx: AND id_level = :id_level:',
            'bind' => [
                'id_ncx' => $id,
                'id_level' => '13',
            ]
        ]);
        $this->view->kendala13s = $kendala13s;
// var_dump($kendala12s); die();
        $sequences = sequence::find("id_ncx='$id'");
        $this->view->sequences = $sequences;

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
            return $this->response->redirect('connect/co' . '/' . $max);
            // return $this->response->redirect('co');
        }
        elseif($tipe_order == 2)
        {
            // return $this->response->redirect('cpe');
            return $this->response->redirect('cpe/cpe' . '/' . $max);

        }
        else{
            return $this->response->redirect('dokumen/data');
        }
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
                return $this->response->redirect('connect/editco' . '/' . $id);
            }
            else{
                return $this->response->redirect('connect/co' . '/' . $id);
            }
            
        }
        elseif($tipe_order == 2)
        {
            $cek = cpe::findFirst("id_ncx='$id'");
            if($cek)
            {
                return $this->response->redirect('cpe/editcpe' . '/' . $id);
            }
            else{
                return $this->response->redirect('cpe/cpe' . '/' . $id);
            }
            

        }
    }

    public function addsequenceAction($id)
    {
        $this->view->id_ncx = $id;
        $cek = sequence::findFirst("id_ncx='$id'");
        if($cek)
        {
            $this->view->nomor = count($cek) + 1;
        }
        else{
            $this->view->nomor = 1;   
        }
        

    }

    public function storesequenceAction()
    {
        $id_ncx = $this->request->getPost('id_ncx');
        $nomor = $this->request->getPost('nomor');
        $nilai_termin = $this->request->getPost('nilai_termin');
        
        $sequence = new sequence();
        $sequence->id_ncx = $id_ncx;
        $sequence->nomor = $nomor;
        $sequence->nilai_termin = $nilai_termin;
        $sequence->save();

        $cekco = connectivity::findFirst("id_ncx='$id_ncx'");
        if($cekco)
        {
            return $this->response->redirect('connect/editcotermin'.'/'.$id_ncx);
        }
        else{
            $cekcpe = cpe::findFirst("id_ncx='$id_ncx'");
            if($cekcpe)
            {
                return $this->response->redirect('cpe/editcpetermin'.'/'.$id_ncx);
            }
            else{
                return $this->response->redirect('dokumen/data');
            }
        }
    }

    public function editsequenceAction($id)
    {     
        $data = sequence::findFirst("id='$id'");
        $dataumum = ncx::findFirst("id='$data->id_ncx'");
        $this->view->data = $data;
        $this->view->dataumum = $dataumum;

        if($dataumum->tipe_order == "1")
        {
            $dataco = connectivity::findFirst("id_ncx='$dataumum->id'");
            $this->view->noorder = $dataco->no_order_con;
        }
        else if($dataumum->tipe_order == "2")
        {
            $datacpe = cpe::findFirst("id_ncx='$dataumum->id'");
            $this->view->noorder = $datacpe->no_order;
        }
        
        $kendala12 = kendala::findFirst([
            'id_ncx = :id_ncx: AND id_level = :id_level: AND id_sequence = :id_sequence:',
            'bind' => [
                'id_ncx' => $data->id_ncx,
                'id_level' => '12',
                'id_sequence' => $id,
            ]
        ]);
        $this->view->kendala12 = $kendala12;

        $kendala13 = kendala::findFirst([
            'id_ncx = :id_ncx: AND id_level = :id_level: AND id_sequence = :id_sequence:',
            'bind' => [
                'id_ncx' => $data->id_ncx,
                'id_level' => '13',
                'id_sequence' => $id,
            ]
        ]);
        $this->view->kendala13 = $kendala13;
    }

    public function storeeditsequenceAction()
    {
        $id = $this->request->getPost('id');
        $detail = sequence::findFirst("id='$id'");
        $id_ncx  = $this->request->getPost('id_ncx');
        $approval_sm  = $this->request->getPost('approval_sm');
        $approval_ubc = $this->request->getPost('approval_ubc');
        $billing_com = $this->request->getPost('billing_com');

        $kendala12 = $this->request->getPost('kendala12');
        $kendala13 = $this->request->getPost('kendala13');

        $detail->approval_sm = $approval_sm;
        $detail->approval_ubc = $approval_ubc;
        $detail->billing_com = $billing_com;
        $detail->save();

        if($kendala12)
        {
            $kendala = kendala::findFirst([
                'id_ncx = :id_ncx: AND id_level = :id_level: AND id_sequence = :id_sequence:',
                'bind' => [
                    'id_ncx' => $id_ncx,
                    'id_level' => '12',
                    'id_sequence' => $id,
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
                $newkendala->id_sequence = $id;
                $newkendala->kendala = $kendala12;
                $newkendala->save();
            }
        }

        if($kendala13)
        {
            $kendala = kendala::findFirst([
                'id_ncx = :id_ncx: AND id_level = :id_level: AND id_sequence = :id_sequence:',
                'bind' => [
                    'id_ncx' => $id_ncx,
                    'id_level' => '13',
                    'id_sequence' => $id,
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
                $newkendala->id_sequence = $id;
                $newkendala->kendala = $kendala13;
                $newkendala->save();
            }
        }
        $cekco = connectivity::findFirst("id_ncx='$id_ncx'");
        if($cekco)
        {
            return $this->response->redirect('connect/editcotermin'.'/'.$id_ncx);
        }
        else{
            $cekcpe = cpe::findFirst("id_ncx='$id_ncx'");
            if($cekcpe)
            {
                return $this->response->redirect('cpe/editcpetermin'.'/'.$id_ncx);
            }
            else{
                return $this->response->redirect('dokumen/data');
            }
        }

    }
    
}