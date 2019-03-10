//StaticTableDataUrl 變數
var StaticTableDataUrl = "";
var StaticSelectDataUrl = "";
var StaticSearchDataUrl = "";
var TableName = "";
//跨域連接
//xhr 取得data function
function LoadData(url, id, cfunc, data) {
	var xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function() {
		if(xhttp.readyState == 4 && xhttp.status == 200) {
			cfunc(id, xhttp, url);
		}
	};
	xhttp.open("POST", url, true);
	xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xhttp.send(data);
}
//cfunc function
//在網頁中放值
function GetData(elementId, xhttp, url) {
	//	console.log(xhttp.responseText);
	document.getElementById(elementId).innerHTML = xhttp.responseText; //目標標籤及內容動作
	StaticTableDataUrl = url; //將Table資料的取得路徑存入卷變數
}

function SelectonGetData(elementId, xhttp, url) {
	//	console.log(xhttp.responseText);
	document.getElementById(elementId).innerHTML = xhttp.responseText; //目標標籤及內容動作
	StaticSelectDataUrl = url; //將Table資料的取得路徑存入卷變數
}

function SearchGetData(elementId, xhttp, url) {
	//	console.log(xhttp.responseText);
	document.getElementById(elementId).innerHTML = xhttp.responseText; //目標標籤及內容動作
	StaticSearchDataUrl = url; //將Table資料的取得路徑存入卷變數
}
//在網頁中放值
function ModalGetData(elementId, xhttp, url) {
	document.getElementById(elementId).innerHTML = xhttp.responseText; //目標標籤及內容動作
}
function TableGetData(elementId, xhttp, url) {
	document.getElementById(elementId).innerHTML = xhttp.responseText; //目標標籤及內容動作
}
function ShowInsertMessage(elementId, xhttp, url) {
	messageModal("新增訊息", xhttp.responseText, 1.5);
	var iput_value = $("#InputSearch").val();
	var select_value = $("#SelectSearchAttribute").val();
	//	console.log("iput_value/" + iput_value);
	//	console.log("select_value/" + select_value);
	//	console.log("TableName/" + TableName);
	if(select_value == 1) {
		console.log(select_value);
		LoadData(StaticTableDataUrl, "TableInfo", SearchGetData, "TableName=" + TableName + "&Attribute=" + select_value + "&Value=" + iput_value);
	} else {
		console.log(select_value);
		LoadData(StaticSearchDataUrl, "TableInfo", SearchGetData, "TableName=" + TableName + "&Attribute=" + select_value + "&Value=" + iput_value);
	}
}

function ShowDeleteMessage(elementId, xhttp, url) {
	messageModal("刪除訊息", xhttp.responseText, 1.5); //目標標籤及內容動作
	var iput_value = $("#InputSearch").val();
	var select_value = $("#SelectSearchAttribute").val();
	//	console.log("iput_value/" + iput_value);
	//	console.log("select_value/" + select_value);
	//	console.log("TableName/" + TableName);
	if(select_value == 1) {
		console.log(select_value);
		LoadData(StaticTableDataUrl, "TableInfo", SearchGetData, "TableName=" + TableName + "&Attribute=" + select_value + "&Value=" + iput_value);
	} else {
		console.log(select_value);
		LoadData(StaticSearchDataUrl, "TableInfo", SearchGetData, "TableName=" + TableName + "&Attribute=" + select_value + "&Value=" + iput_value);
	}
}

function ShowDeleteComfirm(elementId, xhttp, url) {
	document.getElementById(elementId).innerHTML = xhttp.responseText; //目標標籤及內容動作
}
//Html tag 功能控制
//Textarea 文字編輯更動資料庫  dblclick:滑鼠連點二下物件
function TextareaEditSendData(id, url, cfunc, data) {
	$("#" + id).on('dblclick', 'textarea', function() {
		var IdName = $(this).attr("id"); //抓取id
		TableName = IdName.split('.')[0]; //文字切割，並取出資料表名稱
		var AttributeName = IdName.split('.')[1]; //文字切割，並取出屬性名稱
		var IdAttributeName = IdName.split('.')[2]; //文字切割，並資料id
		var Id = IdName.split('.')[3]; //文字切割，並資料id
		var Content = $(this).val(); //取得Textarea中的文字
		//		console.log("tableName:" + TableName);
		//		console.log("IdAttributeName:" + IdAttributeName);
		//		console.log("id:" + Id);
		//		console.log("AttributeName:" + AttributeName);
		//		console.log("Content:" + Content);
		$(this).attr("readonly", false) //去除textarea元素的readonly属性
		$(this).attr("rows", "2") //textarea元素的rows改為10
		$("#" + id).on('blur', '[id="' + IdName + '"]', function(event) { //blur:物件失去焦點時 
			Content = $(this).val(); //取得Textarea中的文字
			//		console.log("BlurContent:"+Content);
			$(this).attr("readonly", false);
			$(this).attr("rows", "1");
			if(Content == "") {
				messageModal("<span style=\"color:red;\">錯誤訊息</span>", "不能輸入空白", 3)
			} else {
				LoadData(url, id, cfunc, data + "&TableName=" + TableName + "&IdAttributeName=" + IdAttributeName + "&Id=" + Id + "&AttributeName=" + AttributeName + "&Content=" + Content);
			}
		});
		//keypress:按下並放開鍵盤按鍵後
		$("#" + id).on('keypress', '[id="' + IdName + '"]', function(event) {
			if(event.keyCode == '13') {
				Content = $(this).val(); //取得Textarea中的文字
				//			console.log("EnterContent:"+Content);
				$(this).attr("readonly", false);
				$(this).attr("rows", "1");
				if(Content == "") {
					messageModal("<span style=\"color:red;\">錯誤訊息</span>", "不能輸入空白", 3)
				} else {
					LoadData(url, id, cfunc, data + "&TableName=" + TableName + "&IdAttributeName=" + IdAttributeName + "&Id=" + Id + "&AttributeName=" + AttributeName + "&Content=" + Content);
				}
			}
		});
	});
}
//Textarea 文字編輯更動資料庫  dblclick:滑鼠連點二下物件
function InputEdit(id) {
	$("#" + id).on('focus', 'input', function() {
		var IdName = $(this).attr("id"); //抓取id
		TableName = IdName.split('.')[0]; //文字切割，並取出資料表名稱
		var AttributeName = IdName.split('.')[1]; //文字切割，並取出屬性名稱
		var IdAttributeName = IdName.split('.')[2]; //文字切割，並資料id
		var Id = IdName.split('.')[3]; //文字切割，並資料id
		var Content = $(this).val(); //取得Textarea中的文字
		//		console.log("tableName:" + TableName);
		//		console.log("IdAttributeName:" + IdAttributeName);
		//		console.log("id:" + Id);
		//		console.log("AttributeName:" + AttributeName);
		//		console.log("Content:" + Content);
		$(this).attr("readonly", false) //去除textarea元素的readonly属性
		$(this).attr("rows", "2") //textarea元素的rows改為10
		$("#" + id).on('blur', '[id="' + IdName + '"]', function(event) { //blur:物件失去焦點時 
			Content = $(this).val(); //取得Textarea中的文字
			//		console.log("BlurContent:"+Content);
			$(this).attr("rows", "1");
		});
		//keypress:按下並放開鍵盤按鍵後
		$("#" + id).on('keypress', '[id="' + IdName + '"]', function(event) {
			if(event.keyCode == '13') {
				Content = $(this).val(); //取得Textarea中的文字
				//			console.log("EnterContent:"+Content);
				$(this).attr("rows", "1");
			}
		});
	});
}
//Input 資料編輯更動資料庫  dblclick:滑鼠連點二下物件
function InputEditSendData(id, url, cfunc, data) {
	$("#" + id).on('dblclick', 'Input', function() {
		var IdName = $(this).attr("id"); //抓取id
		TableName = IdName.split('.')[0]; //文字切割，並取出資料表名稱
		var AttributeName = IdName.split('.')[1]; //文字切割，並取出屬性名稱
		var IdAttributeName = IdName.split('.')[2]; //文字切割，並資料id
		var Id = IdName.split('.')[3]; //文字切割，並資料id
		var Content = $(this).val(); //取得Input中的文字
		//console.log("tableName:" + TableName);
		//console.log("IdAttributeName:" + IdAttributeName);
		//console.log("id:" + Id);
		//console.log("AttributeName:" + AttributeName);
		//console.log("Content:" + Content);
		$(this).attr("readonly", false) //去除textarea元素的readonly属性
		$(this).attr("rows", "2") //textarea元素的rows改為10
			//console.log("type:" + $(this).attr("type"));
		if($(this).attr("type") != "checkbox") {
			$("#" + id).on('blur', '[id="' + IdName + '"]', function(event) { //blur:物件失去焦點時 
				Content = $(this).val(); //取得Textarea中的文字
				//console.log("BlurContent:" + Content);
				$(this).attr("readonly", false);
				$(this).attr("rows", "1");
				if(Content == "") {
					messageModal("<span style=\"color:red;\">錯誤訊息</span>", "不能輸入空白", 3)
				} else {
					LoadData(url, id, cfunc, data + "&TableName=" + TableName + "&IdAttributeName=" + IdAttributeName + "&Id=" + Id + "&AttributeName=" + AttributeName + "&Content=" + Content);
				}
			});
			//keypress:按下並放開鍵盤按鍵後
			$("#" + id).on('keypress', '[id="' + IdName + '"]', function(event) {
				if(event.keyCode == '13') {
					Content = $(this).val(); //取得Textarea中的文字
					//console.log("EnterContent:" + Content);
					$(this).attr("readonly", false);
					$(this).attr("rows", "1");
					if(Content == "") {
						messageModal("<span style=\"color:red;\">錯誤訊息</span>", "不能輸入空白", 3)
					} else {
						LoadData(url, id, cfunc, data + "&TableName=" + TableName + "&IdAttributeName=" + IdAttributeName + "&Id=" + Id + "&AttributeName=" + AttributeName + "&Content=" + Content);
					}
				}
			});
		}
	});
}
// 資料編輯更動資料庫  click:滑鼠連點二下物件
function SelectEditSendData(id, url, cfunc, data) {
	$("#" + id).on('change', "Select", function() {
		var IdName = $(this).attr("id"); //抓取id
		TableName = IdName.split('.')[0]; //文字切割，並取出資料表名稱
		var AttributeName = IdName.split('.')[1]; //文字切割，並取出屬性名稱
		var IdAttributeName = IdName.split('.')[2]; //文字切割，並資料id
		var Id = IdName.split('.')[3]; //文字切割，並資料id
		var Content = $(this).val(); //取得Input中的文字
		console.log("tableName:" + TableName);
		console.log("IdAttributeName:" + IdAttributeName);
		console.log("id:" + Id);
		console.log("AttributeName:" + AttributeName);
		console.log("Content:" + Content);
		$(this).attr("rows", "2") //textarea元素的rows改為10
		$(this).attr("rows", "1");
		if(Content == "") {
			messageModal("<span style=\"color:red;\">錯誤訊息</span>", "不能輸入空白", 3)
		} else {
			//				console.log("Content:" + Content);
			LoadData(url, id, cfunc, data + "&TableName=" + TableName + "&IdAttributeName=" + IdAttributeName + "&Id=" + Id + "&AttributeName=" + AttributeName + "&Content=" + Content + "");
		}
	});
}
//按鍵功能
//Search 按鍵功能
function BtnSearch(btn_id, iput_id, select_id, TableName, target_id, url) {
	$("#" + btn_id).on('click', function() {
		var iput_value = $("#" + iput_id).val();
		var select_value = $("#" + select_id).val();
		//		console.log("iput_value/" + iput_value);
		//		console.log("select_value/" + select_value);
		//		console.log("TableName/" + TableName);
		LoadData(url, target_id, SearchGetData, "TableName=" + TableName + "&Attribute=" + select_value + "&Value=" + iput_value);
	});
}
//Cancel 按鍵功能
function BtnCancel(btn_id, id) {
	$("#" + btn_id).on('click', function() {
		$("#" + id + " input").each(function() {
			$(this).val("");
			//			console.log($(this).attr("id"));
			//			console.log($(this).val());
		});
	});
}
//Insert 按鍵功能
function BtnInsert(btn_id, id, url) {
	$("#" + btn_id).on('click', function() {
		//		console.log(id);
		var Attribute = "";
		var data = "";
		TableName = "";
		Content = ""
		$("#" + id + " input").each(function() {
			var IdName = $(this).attr("id"); //抓取id
			TableName = IdName.split('.')[0]; //文字切割，並取出資料表名稱
			var AttributeName = IdName.split('.')[1]; //文字切割，並取出屬性名稱
			var IdAttributeName = IdName.split('.')[2]; //文字切割，並資料id
			var Id = IdName.split('.')[3]; //文字切割，並資料id
			Content = $(this).val(); //取得Textarea中的文字
			Attribute = Attribute + "." + AttributeName;
			data = data + "." + Content;
			//			console.log("Attribute:" + Attribute);
			//			console.log("data:" + data);
			//			console.log("Content:" + Content);

		});
		if(Content == "") {
			messageModal("<span style=\"color:red;\">錯誤訊息</span>", "有欄位空白，不能輸入空白", 3);
			$("#" + id).modal('show');
		} else {
			LoadData(url, id, ShowInsertMessage, "TableName=" + TableName + "&Attribute=" + Attribute + "&data=" + data + "&test=2");
			$("#" + id).modal('hide');
			$("#" + id + " input").each(function() {
				$(this).val("");
				//			console.log($(this).attr("id"));
				//			console.log($(this).val());
			});
		}
	});
}
//BtnConfirmDelete 按鍵功能
function BtnConfirmDelete(btn_id, target_id, id, url, AttributeName) {
	$("#" + btn_id).on('click', function() {
		$("#" + id).modal('hide');
		var IdCheck = [];
		TableName = "";
		var IdAttributeName = "";
		//針對每一個input tag
		$("#" + target_id + " input").each(function() {
			//判斷它的type
			if($(this).attr("type") == "checkbox") {
				//判斷它的勾選狀態
				if(this.checked == true) {
					var IdName = $(this).attr("id"); //抓取id
					TableName = IdName.split('.')[0]; //文字切割，並取出資料表名稱
					IdAttributeName = IdName.split('.')[2]; //文字切割，並資料id
					var Id = IdName.split('.')[3]; //文字切割，並資料id
					//					console.log(this.value + '/' + this.checked);
					IdCheck.push(Id);
					//console.log('get Id:' + IdCheck);
				}
			}
		});
		LoadData(url, id, ShowDeleteMessage, "TableName=" + TableName + "&IdAttributeName=" + IdAttributeName + "&id=" + IdCheck + "&AttributeName=" + AttributeName + "&Tag=2");

	});
}
//BtnInsertModal 按鍵功能
function BtnInsertModal(btn_id, id, url) {
	$("#" + btn_id).on('click', function() {
		//Insert function Modal 顯示
			LoadData(url, id, ModalGetData, "class=1");
	});
}
//BtnDeleteModal 按鍵功能
function BtnDeleteModal(btn_id, target_id, id, url, AttributeName) {
	$("#" + btn_id).on('click', function() {
		var IdCheck = [];
		TableName = "";
		var IdAttributeName = "";
		//針對每一個input tag
		$("#" + target_id + " input").each(function() {
			//判斷它的type
			if($(this).attr("type") == "checkbox") {
				//判斷它的勾選狀態
				if(this.checked == true) {
					var IdName = $(this).attr("id"); //抓取id
					TableName = IdName.split('.')[0]; //文字切割，並取出資料表名稱
					IdAttributeName = IdName.split('.')[2]; //文字切割，並資料id
					console.log(this.value + '/' + this.checked);
					IdCheck.push(this.value);
					//console.log('get Id:' + IdCheck);
				}
			}
		});
		//		console.log("url:" + url);
		LoadData(url, id, ShowDeleteComfirm, "TableName=" + TableName + "&IdAttributeName=" + IdAttributeName + "&id=" + IdCheck + "&AttributeName=" + AttributeName + "&Tag=1");
	});
}
//訊息彈跳窗
function messageModal(messageTitle, messagetext, second) {
	var time = second * 1000;
	document.getElementById("H4MessageTitle").innerHTML = messageTitle; //訊息
	document.getElementById("DivMessage").innerHTML = messagetext; //訊息
	$('#DivModalMessage').modal('show'); //開啟messageModal
	setTimeout("$('#DivModalMessage').modal('hide')", time); //一段時間後關閉messageModal
}