<?php
use App\Models\Category;
use Illuminate\Http\Request;

/**
 * Hàm hiện danh mục sản phẩm ở trang home
 * @param data        mảng category
 * @param parent      id của parent cha để tìm kiếm
 * @param order        xác định xem đệ quy hiện tại là tên loại(đỏ) hay tên hãng 
 */
function cate_list($data, $parent = 0, $order = 1)
{
    foreach ($data as $cate) {
        if ($cate->parent_id == $parent) {
            if ($order == 1) {
                echo '  <div class="col-md-5">
                            <ul class="multi-column-dropdown">
                ';
                echo '<li class="title-drop"><a href="'.$cate->alias.'/cid-'.$cate->id.'">
                    '.$cate->name.'
                </a></li>';
                      cate_list($data, $cate->id, 2);
                echo '
                       </ul>
                    </div>
                ';
            } else {
                echo '<li><a href="'.$cate->alias.'/cid-'.$cate->id.'">'.$cate->name.'</a></li>';
            }
        }
    }
}

/**
 * Hàm hiện danh mục sản phẩm ở trang admin/category
 * @param data        mảng category
 * @param parent      id của parent cha để tìm kiếm
 * @param select      Khi sửa truyển id cate hiện tại để selected loại đó
 * @param str         xác định thứ tự category
 */
function cate_admin($data, $parent = 0, $str = '--', $select = 0)
{
    // bat buoc id dau trong cate phai bang =0
    foreach ($data as $value) {
        $id=$value->id;
        $name=$value->name;
        if ($value->parent_id == $parent) {
            if ($select != 0 && $id == $select) {
                echo "<option selected='selected' value='$id'><b>$str $name</b></option>";
            } else {
                echo "<option value='$id'><b>$str $name</b></option>";
            }
            cate_admin($data, $id, $str.' --', $select);
        }
    }
}

function bo_dau($str)
{
    $unicode = array(
        'a'=>'á|à|ả|ã|ạ|ă|ắ|ặ|ằ|ẳ|ẵ|â|ấ|ầ|ẩ|ẫ|ậ',
        'd'=>'đ',
        'e'=>'é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ',
        'i'=>'í|ì|ỉ|ĩ|ị',
        'o'=>'ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ',
        'u'=>'ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự',
        'y'=>'ý|ỳ|ỷ|ỹ|ỵ',
        'A'=>'Á|À|Ả|Ã|Ạ|Ă|Ắ|Ặ|Ằ|Ẳ|Ẵ|Â|Ấ|Ầ|Ẩ|Ẫ|Ậ',
        'D'=>'Đ',
        'E'=>'É|È|Ẻ|Ẽ|Ẹ|Ê|Ế|Ề|Ể|Ễ|Ệ',
        'I'=>'Í|Ì|Ỉ|Ĩ|Ị',
        'O'=>'Ó|Ò|Ỏ|Õ|Ọ|Ô|Ố|Ồ|Ổ|Ỗ|Ộ|Ơ|Ớ|Ờ|Ở|Ỡ|Ợ',
        'U'=>'Ú|Ù|Ủ|Ũ|Ụ|Ư|Ứ|Ừ|Ử|Ữ|Ự',
        'Y'=>'Ý|Ỳ|Ỷ|Ỹ|Ỵ'
    );

    foreach ($unicode as $nonUnicode => $uni) {
        $str = preg_replace("/($uni)/i", $nonUnicode, $str);
    }
    $str = preg_replace('/\?|\%/', ' ', $str);
    $str = preg_replace('/\s/', '-', $str);
    $str=trim($str);
    return strtolower($str);
}

    /**
     * Hàm lấy id của category nếu id truyền vào là parent
     * @param param         tham số get cần đặt lại để ko bị trùng lại 
     * @param value         giá trị
     */
function get_category_id($id)
{
    $category = Category::find($id);
    // Kiem tra xem day co phai la first menu ko
    if ($category->parent_id == 0) {
        $categorySub1 = Category::where('parent_id', $id)->pluck('id')->toArray();
    } else {
        $categorySub1 = [$id];
    }

    $categorySub2 = Category::whereIn('parent_id', $categorySub1)->pluck('id')->toArray();

    // Kiem tra neu categorySub2 rong tuc la day la last menu nen ko co sub menu

    if (count($categorySub2)==0) {
        $categorySub2 = [$id];
    } else {
        $categorySub2 = array_prepend($categorySub2, $id);
        $categorySub2 = array_collapse([$categorySub2, $categorySub1]);
    }

    return $categorySub2;
}

    /**
     * Hàm đặt lại tham số filter khi load url không bị trung param(order product) page product
     * @param param         tham số get cần đặt lại để ko bị trùng lại 
     * @param value         giá trị
     */
function rebuild_url_get($param, $value)
{
    $parts = parse_url(url()->full());
    $queryParams = [];
    // Không tồn tại query không có tham số
    if (!isset($parts['query'])) {
        return $url = $parts['path'] . '?' . $param . '=' . $value;
    } else {
        parse_str($parts['query'], $queryParams);
        unset($queryParams[$param]);
        if (isset($queryParams['page'])) {
            unset($queryParams['page']);
        }
        $queryString = http_build_query($queryParams);
        if (!count($queryParams))
        {
            return $url = $parts['path'] . '?' . $param . '=' . $value;
        }

        return $url = $parts['path'] . '?' . $queryString . '&' . $param . '=' . $value;
    }
}

    /**
     * Hàm xóa tham số khỏi điều kiện lọc page product
     * @param param         tham số cần xóa khỏi điểu kiện lọc 
     */
function remove_url_get($param)
{
    $parts = parse_url(url()->full());
    $queryParams = [];
    parse_str($parts['query'], $queryParams);
    unset($queryParams[$param]);
    if (isset($queryParams['page'])) {
        unset($queryParams['page']);
    }
    $queryString = http_build_query($queryParams);
    if ($queryString == '') {
        return $url = $parts['path'];
    }
    
    return $url = $parts['path'] . '?' . $queryString;
}

function changeCurrency($value)
{
    return number_format($value);
}
