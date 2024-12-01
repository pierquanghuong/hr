<?php

namespace Modules\Vote\Controllers;

use App\Controllers\BaseController;
use Modules\NhanVien\Models\NhanVienModel;
use Modules\Vote\Models\VoteModel;
use App\Modules\Vote\Models\VoteBuilder;

class Vote extends BaseController
{
    protected $folder_directory = "Modules\\Vote\\Views\\";

    protected $voteModel;
    protected $voteBuilder;
    protected $nhanvienModel;

    public function __construct()
    {
        $this->nhanvienModel = new NhanVienModel();
        $this->voteModel = new VoteModel();
        $this->voteBuilder = new VoteBuilder();
    }
    
    /**
     * index render trang đề cử
     *
     * @return void
     */
    public function index()
    {   
        $session  = session();
        $nominer = $session->get('AuthNhanvien');
        //Lay danh sach cac giai thuong - award
        $awards = service('settings')->get('HrGame.awards');

        //Lay danh sach giai thuong da de cu
        $awards_already = [];
        foreach (array_keys($awards) as $key) {
            if ($this->voteBuilder->checkNomineerVoteAward($nominer['id'], $key)) {
                array_push($awards_already, $key);
            }
        }

        return view($this->folder_directory . 'index', ['awards' => $awards, 'award_already' => $awards_already]);
    }
    
    /**
     * award render trang đề cử cho giải thưởng đã chọn
     *
     * @param  mixed $seg1
     * @param  mixed $seg2
     * @return void
     */
    public function award()
    {
        //lay du liẹu người đề cử
        $session  = session();
        $nominer = $session->get('AuthNhanvien');

        $uri = $this->request->getUri();
        $award_id = $uri->getSegment(3);

        //check nguoi dung da de cu giai chua
        if ($this->voteBuilder->checkNomineerVoteAward($nominer['id'], $award_id)) {
            return redirect('vote');
        }
        $awards = service('settings')->get('HrGame.awards');
        return view($this->folder_directory . 'award', ['award' => $awards[$award_id], 'award_id' => $award_id]);
    }
    
    /**
     * storeAward lưu đề cử
     *
     * @return void
     */
    public function storeAward()
    {
        if (! $this->request->is('post')) {
            return view($this->folder_directory . 'index');
        }

        //validate data
        $rules = [
            'nominee' => 'required',
            'reason' => 'required',
            'award' => 'required',
        ];

        //lay du liẹu người đề cử
        $session  = session();
        $nominer = $session->get('AuthNhanvien');

        $data = $this->request->getPost(array_keys($rules));
         // validate dữ liệu
         if (! $this->validateData($data, $rules)) {
            return redirect()->back()->withInput()->with('msg', 'Vui lòng nhập đủ dữ liệu');
        }

        $award_data = $this->validator->getValidated();
        $award_data['nomineer'] = $nominer['id'];

        //check giai thuong da duoc de cu chua
        if ($this->voteBuilder->checkNomineerVoteAward($nominer['id'], $award_data['award'])) {
            return redirect('vote');
        }

        $this->voteModel->insert($award_data);

        $nominee = $this->nhanvienModel->where('id', $award_data['nominee'])->first();

        return view( $this->folder_directory . 'thankyou', ['nominee' => $nominee['hoten']]);
    }
}