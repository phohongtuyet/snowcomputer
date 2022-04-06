@extends('layouts.admin')
@section('title', 'Gmail')
@section('content')
<section class="section">
    @if (session('status'))
        <div id="AlertBox" class="alert alert-success hide" role="alert">
            {!! session('status') !!}
        </div>
    @endif
    <div class="section-body">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
                <div class="card">
                    <div class="card-body">
                        <div id="mail-nav">
                            <ul id="mail-folders" class="nav nav-pills flex-column" id="myTab4" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="home-tab4" data-toggle="tab" href="#home4" role="tab"
                                    aria-controls="home" aria-selected="true">Home</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="profile-tab4" data-toggle="tab" href="#profile4" role="tab"
                                    aria-controls="profile" aria-selected="false"> Khuyễn mãi</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="contact-tab4" data-toggle="tab" href="#contact4" role="tab"
                                    aria-controls="contact" aria-selected="false">Hỗ trợ </a>
                                </li>
                            </ul>    
                        </div>
                    </div>
                </div>
            </div>        
            <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9">
                <div class="tab-content no-padding" id="myTab2Content">
                    <div class="tab-pane fade show active" id="home4" role="tabpanel" aria-labelledby="home-tab4">
                           <img src="{{ asset('public/admin/img/email.png')}}" width="100%" alt="">
                    </div>
                    <div class="tab-pane fade" id="profile4" role="tabpanel" aria-labelledby="profile-tab4">
                        <div class="card">
                            <div class="boxs mail_listing">
                                <div class="inbox-center table-responsive">
                                    <table class="table table-hover" >
                                        <thead>
                                            <tr>
                                                <th colspan="3">
                                                    <div class="inbox-header">
                                                        <div class="mail-option">
                                                            <div class="email-btn-group m-l-15">
                                                                <a href="{{route('admin.gmail')}}" class="col-dark-gray waves-effect m-r-20" title="Trở về"
                                                                    data-toggle="tooltip">
                                                                    <i class="material-icons">keyboard_return</i>
                                                                </a>                                                 
                                                            </div>
                                                        </div>
                                                    </div>
                                                </th>
                                                <th class="hidden-xs" colspan="2">
                                                    <div class="pull-right">
                                                        <div class="email-btn-group m-l-15">
                                                            <a href="#" class="col-dark-gray waves-effect m-r-20" title="previous"
                                                            data-toggle="tooltip">
                                                            <i class="material-icons">navigate_before</i>
                                                            </a>
                                                            <a href="#" class="col-dark-gray waves-effect m-r-20" title="next"
                                                            data-toggle="tooltip">
                                                            <i class="material-icons">navigate_next</i>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($khuyenmai as $value)
                                                <tr class="unread">
                                                    <td class="tbl-checkbox">
                                                        <label class="form-check-label">
                                                        <a href="#xoa" data-toggle="modal" data-target="#exampleModal" onclick="getXoa({{ $value->id }}); return false;"" class="col-dark-gray waves-effect m-r-20" title="Xóa"
                                                            data-toggle="tooltip">
                                                            <i class="material-icons">delete</i>
                                                        </a>
                                                        </label>
                                                    </td>
                                                  
                                                    <td class="hidden-xs">{{$value->email}}</td>
                                                    <td class="max-texts">
                                                        <a href="{{ route('admin.lienhe.repkhuyenmai', ['id' => $value->id]) }}">
                                                            <span class="badge badge-danger">@if($value->trangthai == 0 ) chưa xử lý @endif</span>
                                                            {{$value->noidung}}
                                                        </a>
                                                    </td>
                                                    
                                                    <td class="text-right">{{date_format($value->created_at,"d/m/Y H:i:s"); }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <div class="row">
                                    <div class="col-sm-7 ">
                                    <p class="p-15">{{ $khuyenmai->links() }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="contact4" role="tabpanel" aria-labelledby="contact-tab4">
                        <div class="card">
                            <div class="boxs mail_listing">
                                <div class="inbox-center table-responsive">
                                    <table class="table table-hover">
                                        <thead>
                                            <tr>   
                                                <th colspan="3">
                                                    <div class="inbox-header">
                                                        <div class="mail-option">
                                                            <div class="email-btn-group m-l-15">
                                                                <a href="{{route('admin.gmail')}}" class="col-dark-gray waves-effect m-r-20" title="Trở về"
                                                                    data-toggle="tooltip">
                                                                    <i class="material-icons">keyboard_return</i>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </th>
                                                <th class="hidden-xs" colspan="2">                                              
                                                </th>  
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($lienhe as $value)
                                                <tr class="unread">
                                                    <td class="tbl-checkbox">
                                                        <label class="form-check-label">
                                                            <a href="#xoa" data-toggle="modal" data-target="#exampleModal" onclick="getXoa({{ $value->id }}); return false;"" class="col-dark-gray waves-effect m-r-20" title="Xóa"
                                                                data-toggle="tooltip">
                                                                <i class="material-icons">delete</i>
                                                            </a>
                                                        </label>
                                                    </td>
                                                   
                                                    <td class="hidden-xs">{{$value->email}}</td>
                                                    <td class="max-texts">
                                                        <a href="{{ route('admin.lienhe.phanhoi', ['id' => $value->id]) }}">
                                                            {{$value->noidung}}
                                                            <span class="badge badge-danger">@if($value->trangthai == 0 ) chưa xử lý @endif</span>
                                                       </a>
                                                    </td>
                                                   
                                                    <td class="text-right">{{date_format($value->created_at,"d/m/Y H:i:s"); }}</td>
                                                </tr>
                                            @endforeach
                                            
                                        </tbody>
                                    </table> 
                                </div>
                                <div class="row">
                                    <div class="col-sm-7 ">
                                    <p class="p-15">{{ $lienhe->links() }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>              
        </div>
    </div>
</section>
<form action="{{ route('admin.lienhe.xoa') }}" method="post">
		@csrf
		<input type="hidden" id="ID_delete" name="ID_delete" value="" />
		<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Xóa Gmail </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>  				</div>
				<div class="modal-body">
					<p class="font-weight-bold text-danger"><i class="fas fa-question-circle"></i> Xác nhận xóa? Hành động này không thể phục hồi.</p>
				</div>
				<div class="modal-footer">

					<button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="fas fa-times"></i> Hủy bỏ</button>
					<button type="submit" class="btn btn-danger"><i class="fas fa-trash-alt"></i> Thực hiện</button>
				</div>
				</div>
			</div>
		</div>
	</form>

@endsection
@section('javascript')
	<script>  
        $(document).ready(function() {
            $('#AlertBox').removeClass('hide');
            $('#AlertBox').delay(2000).slideUp(500);
        });
		function getXoa(id) {
			$('#ID_delete').val(id);
		}
	</script>
@endsection