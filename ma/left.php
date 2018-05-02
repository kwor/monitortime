<!-- 側邊欄 begin--> 
    
<div data-role="panel" id="defaultpanel" data-theme="b">
<script type="text/javascript" language="javascript">
    function exitSystem() {
        if (confirm("確定要退出嗎？")) {
            //是
            window.top.location = "Quit.php";
            return true;
        }
        else {
            //否 
            return false;
        }
    }
</script>
    <div class="panel-content"> 
        <h3>菜单</h3> 
            <a href="Main.php" data-transition="slide"><p>主表</p></a> 
            

       
    </div> 
</div>
<!-- 側邊欄 end--> 