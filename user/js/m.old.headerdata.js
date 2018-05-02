//var data = { "liBtn0": "����", "liBtn1": "test" };
//�˵�ѡ��
//ids���˵���id��url:�˵����ӣ�flag:�Ƿ������
function selectMenu(ids, url,flag) {
    var liList = $("#navBtnMenu li");
    if(ids == '6'){
        if(!confirm("���_���˳��᣿")){
            return;
        }
    }
    for (var i = 0; i < liList.length; i++) {
        if (liList[i].id == ("liBtn" + ids)) {
            liList[i].className = "onBtn";
        }
        else {
            liList[i].className = "navBtn";
        }
    };
    var fotteryFlag = $("#FotteryFlag").val();
    var uri = url + "?LLT=" + fotteryFlag;
    if (uri.indexOf("Report_JeuWJS.aspx") > -1 && fotteryFlag != "0") {
        uri = "Report_JeuWJS_kc.aspx?LLT=" + fotteryFlag;
        goto_URL(uri);
    }
    else {
        goto_URL(uri);
    }

//    if (flag == "1") {
//        //��������
//        var fotteryFlag = $("#FotteryFlag").val();
//        //goto_URL(url + "?LLT=" + fotteryFlag);
//    }
//    else {
//        //goto_URL(url);
//    }
};
function goto_URL(url) {
    if (url.substring(0, 7) == "Report_") {
        if (SB_Limit_Time > Today_Second()) {
            parent.frames["mainFrame"].document.close();
            parent.frames["mainFrame"].document.write(Html_SB);
        } else {
            parent.frames["mainFrame"].location = url;
        }
    } else {
        parent.frames["mainFrame"].location = url;
    }

    var liList = $("#navListBox a");
    for (var i = 0; i < liList.length; i++) {
        liList[i].className = "";
    };
}

//���ַ���0�����ϲʣ�1���V�|�옷ʮ�֣�2���ؑc�r�r�ʣ�3������ِ܇(PK10)��4���ؑc���\�r����5:��������(���տ�3)
var  = new Array();
[0] = "<a href='javascript:void(0)' onclick='goto_CI(1,0,this.id)' id='MC0'>�شa</a><b>|</b><a href='javascript:void(0)' onclick='goto_CI(3,0,this.id)' id='MC1'>���a</a><b>|</b><a href='javascript:void(0)' onclick='goto_CI(4,0,this.id)' id='MC2'>���a��</a><b>|</b><a href='javascript:void(0)' onclick='goto_CI(10,0,this.id)' id='MC3'>�B�a</a><b>|</b><a href='javascript:void(0)' onclick='goto_CI(18,0,this.id)' id='MC4'>����</a><b>|</b><a href='javascript:void(0)' onclick='goto_CI(11,0,this.id)' id='MC5'>���a1-6</a><b>|</b><a href='javascript:void(0)' onclick='goto_CI(12,0,this.id)' id='MC6'>�شa��Ф</a><b>|</b><a href='javascript:void(0)' onclick='goto_CI(13,0,this.id)' id='MC7'>��Фβ��</a><b>|</b><a href='javascript:void(0)' onclick='goto_CI(15,0,this.id)' id='MC8'>�벨</a><b>|</b><a href='javascript:void(0)' onclick='goto_CI(16,0,this.id)' id='MC9'>��Ф/��Ф�B/β���B</a><b>|</b><a href='javascript:void(0)' onclick='goto_CI(17,0,this.id)' id='MC10'>����/�شa����</a>";

[1] = "<a href='javascript:void(0)' onclick='goto_CI(16,1,this.id)' id='MC16'>����P</a><b>|</b><a href='javascript:void(0)' onclick='goto_CI(23,1,this.id)' id='MC23'>����1-8</a><b>|</b><a href='javascript:void(0)' onclick='goto_CI(1,1,this.id)' id='MC1'>��һ��</a><b>|</b><a href='javascript:void(0)' onclick='goto_CI(2,1,this.id)' id='MC2'>�ڶ���</a><b>|</b><a href='javascript:void(0)' onclick='goto_CI(3,1,this.id)' id='MC3'>������</a><b>|</b><a href='javascript:void(0)' onclick='goto_CI(4,1,this.id)' id='MC4'>������</a><b>|</b><a href='javascript:void(0)' onclick='goto_CI(5,1,this.id)' id='MC5'>������</a><b>|</b><a href='javascript:void(0)' onclick='goto_CI(6,1,this.id)' id='MC6'>������</a><b>|</b><a href='javascript:void(0)' onclick='goto_CI(7,1,this.id)' id='MC7'>������</a><b>|</b><a href='javascript:void(0)' onclick='goto_CI(8,1,this.id)' id='MC8'>�ڰ���</a><b>|</b><a href='javascript:void(0)' onclick='goto_CI(9,1,this.id)' id='MC9'>���͡�����</a><b>|</b><a href='javascript:void(0)' onclick='goto_CI(10,1,this.id)' id='MC10'>�B�a</a>";

[2] = "<a href='javascript:void(0)' onclick='goto_CI(17,2,this.id)' id='MC17'>����P</a><b>|</b><a href='javascript:void(0)' onclick='goto_CI(24,2,this.id)' id='MC24'>����1-5</a><b>|</b><a href='javascript:void(0)' onclick='goto_CI(11,2,this.id)' id='MC11'>��һ��</a><b>|</b><a href='javascript:void(0)' onclick='goto_CI(12,2,this.id)' id='MC12'>�ڶ���</a><b>|</b><a href='javascript:void(0)' onclick='goto_CI(13,2,this.id)' id='MC13'>������</a><b>|</b><a href='javascript:void(0)' onclick='goto_CI(14,2,this.id)' id='MC14'>������</a><b>|</b><a href='javascript:void(0)' onclick='goto_CI(15,2,this.id)' id='MC15'>������</a>";

[3] = "<a href='javascript:void(0)' onclick='goto_CI(21,3,this.id)' id='MC21'>����P</a><b>|</b><a href='javascript:void(0)' onclick='goto_CI(22,3,this.id)' id='MC22'>����1-10</a><b>|</b><a href='javascript:void(0)' onclick='goto_CI(18,3,this.id)' id='MC18'>�ڡ���܊ �M��</a><b>|</b><a href='javascript:void(0)' onclick='goto_CI(19,3,this.id)' id='MC19'>�����ġ��塢����</a><b>|</b><a href='javascript:void(0)' onclick='goto_CI(20,3,this.id)' id='MC20'>�ߡ��ˡ��š�ʮ��</a>";

[4] = "<a href='javascript:void(0)' onclick='goto_CI(26,4,this.id)' id='MC26'>����P</a><b>|</b><a href='javascript:void(0)' onclick='goto_CI(27,4,this.id)' id='MC27'>����1-8</a><b>|</b><a href='javascript:void(0)' onclick='goto_CI(28,4,this.id)' id='MC28'>��һ��</a><b>|</b><a href='javascript:void(0)' onclick='goto_CI(29,4,this.id)' id='MC29'>�ڶ���</a><b>|</b><a href='javascript:void(0)' onclick='goto_CI(30,4,this.id)' id='MC30'>������</a><b>|</b><a href='javascript:void(0)' onclick='goto_CI(31,4,this.id)' id='MC31'>������</a><b>|</b><a href='javascript:void(0)' onclick='goto_CI(32,4,this.id)' id='MC32'>������</a><b>|</b><a href='javascript:void(0)' onclick='goto_CI(33,4,this.id)' id='MC33'>������</a><b>|</b><a href='javascript:void(0)' onclick='goto_CI(34,4,this.id)' id='MC34'>������</a><b>|</b><a href='javascript:void(0)' onclick='goto_CI(35,4,this.id)' id='MC35'>�ڰ���</a><b>|</b><a href='javascript:void(0)' onclick='goto_CI(36,4,this.id)' id='MC36'>���͡�����Ұ�F</a><b>|</b><a href='javascript:void(0)' onclick='goto_CI(37,4,this.id)' id='MC37'>�B�a</a>";

[5] = "<a href='javascript:void(0)' onclick='goto_CI(37,5,this.id)' id='MC38'>��С����</a>";

[6] = "<a href='javascript:void(0)' onclick='goto_CI(39,6,this.id)' id='MC39'>���͡��Ȕ�������</a><b>|</b><a href='javascript:void(0)' onclick='goto_CI(40,6,this.id)' id='MC40'>���a</a>";

//�����˵�
function enterSysIndex(text, uri) {
    $("#currentType").html(text);
    var hrefText = [uri].toString();
    $("#navListBox").html("");
    $("#navListBox").html(hrefText);
    switch (uri) {
        case "0":
            goto_CI('1', uri, 'MC0');
            break;
        case "1":
            goto_CI('16', uri, 'MC16');
            break;
        case "2":
            goto_CI('17', uri, 'MC17');
            break;
        case "3":
            goto_CI('21', uri, 'MC21');
            break;
        case "4":
            goto_CI('26', uri, 'MC26');
            break;
        case "5":
            goto_CI('37', uri, 'MC38');
            break;
        case "6":
            goto_CI('39', uri, 'MC39');
            break;
        default: break;
    }
    $("#FotteryFlag").val(uri);
}

//T:��ȡ���ݵĴ��ݲ���
//fid:���0�����ϲʣ�1���V�|�옷ʮ�֣�2���ؑc�r�r�ʣ�3������ِ܇(PK10)��4���ؑc���\�r����5:��������/���տ�3��
function goto_CI(T, fid, objID) {
    var flag = fid.toString();
    if (flag == "0") {
        if (T == '' || T == null) {
            window.parent.frames["mainFrame"].location = "CI1.aspx?T=" + T;
        } else {
            window.parent.frames["mainFrame"].location = "CI1.aspx?T=" + T;
        }
    }
    else {
        var s_LT = flag;
        if (T == '' || T == null) {
            window.parent.frames["mainFrame"].location = "CI_" + s_LT + ".aspx?T=" + T + "&UVID=0";
        } else {
            window.parent.frames["mainFrame"].location = "CI_" + s_LT + ".aspx?T=" + T + "&C=1" + "&UVID=0";
        }
    }

    var liList = $("#navListBox a");
    for (var i = 0; i < liList.length; i++) {
        if (liList[i].id == objID) {
            liList[i].className = "onBtn1";
        }
        else {
            liList[i].className = "";
        }
    };

    var liList = $("#navBtnMenu li");
    for (var i = 0; i < liList.length; i++) {
        liList[i].className = "navBtn";
    };

}
function Select_MC(MC_ID) {

}

var SB_Limit_Time = 0; //���u�r�g

function Today_Second() {
    var date = new Date();
    return date.getHours() * 3600 + date.getMinutes() * 60 + date.getSeconds();
}

function SB_Limit(Ltime) {
    SB_Limit_Time = Today_Second() + Ltime;
}



function xmlLoadNews() {
    try {
        $.ajax({
            async: true,
            url: 'Ad_Xml.aspx',
            type: 'GET',
            dataType: 'xml',
            cache: false,
            timeout: 5000,
            error: function (XMLHttpRequest, textStatus, errorThrown) {
                document.getElementById("Affiche").innerHTML = "�@ȡ������Ϣʧ��,���������B��...";
                setTimeout("UpdateAD()", 2000);
             },
            success: function (xml) {
                try {
                    XmlTraverse(xml.documentElement);
                } catch (e) {
                    setTimeout("UpdateAD()", 1000); 
                }
            }
        })
    } catch (e) {
        setTimeout("UpdateAD()", 2000); 
    }
}

function XmlTraverse(pnode) {
    var l = pnode.childNodes.length;
    for (var i = 0; i < l; i++) {
        var node = pnode.childNodes[i];
        if (node.tagName == "ReadErr") { //error
            if (get_xml_text(node) == "EXIT") top.location.href = "../";
        } else if (node.tagName == "Affiche") {
            try {
                document.getElementById("Affiche").innerHTML = get_xml_text(node);
            } catch (e) { }
            //�^�m
            t_UpdateAD = 8;
            setTimeout("UpdateAD()", 1000);
        }
    }
}

var t_UpdateAD = 8;
var RealityIP = '';
//���µ���ʱ
function UpdateAD() {
    if (t_UpdateAD > 1) {
        t_UpdateAD = t_UpdateAD - 1;
        setTimeout("UpdateAD()", 1000);
    } else {
        xmlLoadNews();
    }
}

function get_xml_text(node) {
    if (-[1, ]) {
        return $.trim(node.textContent);
    } else {
        return $.trim(node.text);
    }
}

