<?php

/**
 * 分页链接生成函数
 * @param int $page URL传递的page值
 * @param int $max_page 最大页码值
 */
function makePageHtml($page, $max_page) {
    //删除GET参数中的page
    unset($_GET['page']);
    //重新生成URL中的GET参数
    $params = http_build_query($_GET);
    if ($params) {
        $params .= '&';
    }
    //计算下一页
    $next_page = $page + 1;
    //判断下一页的页码是否大于最大页码值，如果大于则把最大页码值赋值给它
    if ($next_page > $max_page)
        $next_page = $max_page;
    //计算上一页
    $prev_page = $page - 1;
    //判断上一页的页码是否小于1，如果小于则把1赋值给它
    if ($prev_page < 1)
        $prev_page = 1;
    //重新拼接分页链接的html代码
    $page_html = '<ul class= pagination><li class=page-item><a class=page-link href="?' . $params . 'page=1">首页</a></li>';
    if ($page > 1) {
        $page_html .= '<li class=page-item><a class=page-link href="?' . $params . 'page=' . $prev_page . '">上一页</a></li>';
    }

    if ($page <= $max_page && $page > 1)
        $page_html .= '<li class=page-item><a class=page-link href="?' . $params . 'page=' . $prev_page . '">&lt;</a></li>';
    for ($i = 1; $i <= $max_page; $i++) {
        //当前页时,class=active
        $class = '';
        if ($i == $page) {
            $class = 'class="active page-link"';
        }else{
            $class = 'class="page-link"';
        }

        //显示页码
        if ($i >= $page && $i <= $page + 2) {
            $page_html .= '<li class=page-item><a href="?' . $params . 'page=' . $i . '" ' . $class . '>' . $i . '</a></li>';
        }
    }
    if ($page < $max_page - 2)
        $page_html .= '<li class=page-item><a class=page-link href="?' . $params . 'page=' . $next_page . '">&gt;</a></li>';
    if ($page != $max_page) {
        $page_html .= '<li class=page-item><a class=page-link href="?' . $params . 'page=' . $next_page . '">下一页</a></li>';
    }
    $page_html .= '<li class=page-item><a class=page-link href="?' . $params . 'page=' . $max_page . '">尾页</a></li></ul>';

    //返回分页链接
    return $page_html;
}
