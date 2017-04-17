@extends('layouts.master')

@section('title', 'Thông tin cây vải mộc')

@section('content')
    <form action='/cayvaimoc/{{ $cayvaimoc->id }}' method='post'>
        <input type="hidden" name="_method" value="put">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">

        <p>
            <label>Id:</label>
            <input style='cursor:not-allowed' disabled required name='id' value='{{ $cayvaimoc->id }}' />
        </p>

        <p>
            <label>Loại vải:</label>
            <a href='/loaivai/{{ $cayvaimoc->loai_vai_id }}'>{{ $cayvaimoc->loai_vai_id }}
                @if ($cayvaimoc->loai_vai)
                    - {{  $cayvaimoc->loai_vai->ten }}
                @endif
            </a>
        </p>

        <p>
            <label>Số mét:</label>
            <input style='cursor:not-allowed' disabled required type='number' name='so_met' value='{{ $cayvaimoc->so_met }}' />
        </p>

        <p>
            <label>Nhân viên dệt:</label>
            <a href='/nhanvien/{{ $cayvaimoc->nhan_vien_det_id }}'>{{ $cayvaimoc->nhan_vien_det_id }}
                @if ($cayvaimoc->nhan_vien_det)
                    - {{  $cayvaimoc->nhan_vien_det->ten }}
                @endif
            </a>
        </p>

        <p>
            <label>Mã máy dệt:</label>
            <input style='cursor:not-allowed' disabled required name='ma_may_det' value='{{ $cayvaimoc->ma_may_det }}' />
        </p>

        <p>
            <label>Ngày giờ dệt:</label>
            <input style='cursor:not-allowed' disabled required type='datetime-local' step="1" name='ngay_gio_det' value='{{ str_replace(" ","T",$cayvaimoc->ngay_gio_det) }}' />
        </p>

        <p>
            <label>Kho:</label>
            <a href='/kho/{{ $cayvaimoc->kho_id }}'>{{ $cayvaimoc->kho_id }}
                @if ($cayvaimoc->kho)
                    - {{  $cayvaimoc->kho->ten }}
                @endif
            </a>
        </p>

        <p>
            <label>Ngày giờ nhập kho:</label>
            <input style='cursor:not-allowed' disabled required type='datetime-local' step="1" name='ngay_gio_nhap_kho' value='{{ str_replace(" ","T",$cayvaimoc->ngay_gio_nhap_kho) }}' />
        </p>

        <p>
            <label>Phiếu xuất mộc:</label>
            <a href='/kho/{{ $cayvaimoc->phieu_xuat_moc_id }}'>{{ $cayvaimoc->phieu_xuat_moc_id }}
                @if ($cayvaimoc->phieu_xuat_moc)
                    - {{  $cayvaimoc->phieu_xuat_moc->loai_vai->ten }}
                @endif
            </a>
        </p>

        <p>
            <label>Lô nhuộm:</label>
            <a href='/lonhuom/{{ $cayvaimoc->lo_nhuom_id }}'>{{ $cayvaimoc->lo_nhuom_id }}
                @if ($cayvaimoc->lo_nhuom)
                    - v{{ $cayvaimoc->lo_nhuom->loai_vai_id }} - {{ $cayvaimoc->lo_nhuom->mau->ten }}
                @endif
            </a>
        </p>

        <p><a href='/cayvaimoc/{{ $cayvaimoc->id }}/edit' class='btn btn-success'>Chỉnh sửa</a></p>
    </form>


    @if ($cayvaimoc->trashed())
        <p><a href='/cayvaimoc/{{ $cayvaimoc->id }}/restore' class='btn btn-warning'>Khôi phục<a/></p>
    @else
        <form action='/cayvaimoc/{{ $cayvaimoc->id }}' method='post'>
            <input type="hidden" name="_method" value="delete">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <p><input type='submit' class='btn btn-danger' value='Xóa' /></p>
        </form>
    @endif
@endsection
