var order = {

    del: function(id) {
    layer.open({
        content: "你确定要删除吗？",
        icon: 3,
        btn: ['是', '否'],
        yes: function () {
            $.ajax({
                type: 'GET', //请求类型
                url: "index.php?g=Order&m=AdminOrder&a=delete", //提交URL地址
                dataType: 'json',   //返回格式
                data: {id: id}, //数据
                success: function (data) { //如果成功，执行
                    if (data.status != 0) {   //返回状态不为0时，显示对应的错误
                        layer.open({
                            content: data.message,
                            icon: 2,
                            title: '错误提示',
                        });
                        return;
                    }
                    layer.open({
                        content: data.message,
                        icon: 1,
                        yes: function () {
                            location.href = "index.php?g=Order&m=AdminOrder&a=orderList";
                        },
                    });
                },
                error: function (xhr, status) { //如果失败，执行
                    console.log(xhr);   //在控制台显示错误的原因以及返回值
                    console.log(status);
                }
            });
        },
    });
},


}