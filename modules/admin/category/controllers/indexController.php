<?php

function construct()
{
    request_auth();
    load_model('index');
}

function indexAction()
{
    $data['categories'] = get_list_categories();
    load_view('index', $data);
}

function createAction()
{
    load_view('create');
}

function createPostAction()
{
    $name = $_POST['name'];

    if (empty($name)) {
        push_notification('danger', ['Vui lòng nhập vào tên danh mục']);
        header('Location: ?role=admin&mod=category&action=create');
        die;
    }
    create_category($name);

    push_notification('success', ['Tạo mới danh mục sản phẩm thành công']);
    header('Location: ?role=admin&mod=category');
    die;
}

function deleteAction()
{
    $id = $_GET['id_cate'];
    delete_category($id);
    push_notification('success', ['Xoá danh mục sản phẩm thành công']);
    header('Location: ?role=admin&mod=category');
    die;
}

function updateAction()
{
    $id = $_GET['id_cate'];
    $cate = get_one_category($id);
    $data['category'] = $cate;
    if ($cate) {
        load_view('update', $data);
    } else {
        header('Location: ?role=admin&mod=category');
        die;
    }
}

function updatePostAction()
{
    $id = $_GET['id_cate'];
    $cate = get_one_category($id);
    if (!$cate) {
        header('Location: ?role=admin&mod=category');
        die;
    }
    $name = $_POST['name'];

    if (empty($name)) {
        push_notification('errors', [
            'name' => 'Vui lòng nhập vào tên danh mục'
        ]);
        header('Location: ?role=admin&mod=category&action=update&id_cate=' . $id);
        die;
    }
    update_category($id, $name);
    push_notification('success', ['Chỉnh sửa danh mục sản phẩm thành công']);
    header('Location: ?role=admin&mod=category');
    die;
}
