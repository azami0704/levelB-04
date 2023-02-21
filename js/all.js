
//驗證碼
let num1=0,num2=0;
cap();
function cap(){
    num1=0,num2=0;
    num1=Math.round(Math.random()*100);
    num2=Math.round(Math.random()*100);
    $('#captcha').text(`${num1}+${num2}=`)
}

$('#login').submit(function(e){
    let direct=$("[name='table']").val()=='Admin'?'admin':'index';
    e.preventDefault();
    if($('#aws').val()==num1+num2){
        $.post("./api/login.php",$(this).serialize())
        .done(res=>{
            if(parseInt(res)==1){
                location.href=`${direct}.php`;
            }else{
                alert('帳號或密碼錯誤');
            }
        });
    }else{
        alert('驗證碼錯誤');
        $('#login').trigger('reset');
    }
})

function checkAcc(){
    return new Promise((resolve)=>{
        if($("[name='ac']").val()=='admin'){
            alert('帳號已存在');
            resolve(false);
            return;
        }
        $.post("./api/login.php",{ac:$("[name='ac']").val(),table:$("[name='table']").val()})
        .done(res=>{
            if(res*1>0){
                alert('帳號已存在');
                resolve(false);
            }else{
                alert('帳號可使用');
                resolve(true);
            }
        })
        
    })
}

const reg= async function(...args){
    const [str,direct]=args;
    let canReg=await checkAcc();
    canReg && await save.call(this,direct,true,str);
}

/*存資料function,需要綁this
params=(返回頁,是否開啟alert(預設不開啟),alert文案)*/
function save(direct,alt=false,...str){
    $.post("./api/reg.php",$(this).serialize())
    .done(res=>{
        if(alt){
            alert(str);
        }
        location.href=`?do=${direct}`;
    })
}

function re(){
    history.go(-1);
}

//要傳圖的表單
function formWithFiles(){
    if($('[name="img"]')[0].files[0]){
        let formData=new FormData(this);
        formData.append('img',$('[name="img"]')[0].files[0]);
        $.ajax({
            url:"./api/reg.php",
            data:formData,
            type:'POST',
            contentType: false,
            processData: false,
        }).done(res=>{
            location.href="?do=th";
        })
    }else{
        save.call(this,'th');
    }
}

//刪除用
function del(data){
    $.post("./api/del_mem.php",data)
    .done(res=>{
        $(this).closest('tr').remove();
    })
}


