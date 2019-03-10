//讀取資料庫資料
LoadData("php/Tenant/TenantAppraisal.php", "TableInfo", GetData, "class=1");
//讀取資料庫資料
LoadData("php/Tenant/Action/Getdata/SearchAttributeGetdata.php", "SelectSearchAttribute", SelectonGetData, "TableName="+"score");
//Textarea編輯
TextareaEditSendData("TableInfo", "php/Tenant/Action/Update/TenantAppraisalUpdata.php", GetData, "class=1");
//Input編輯
InputEditSendData("TableInfo", "php/Tenant/Action/Update/TenantAppraisalUpdata.php", GetData, "class=1");
//開啟Iput tag 輸入功能
InputEdit("ModalInsert");
//取消按鍵清除Input tag的value
BtnCancel("BtnCancel","ModalInsert");
//Insert 按鍵功能
BtnInsert("BtnConfirmInsert", "ModalInsert","php/Tenant/Action/Insert/FunctionInsert.php");

BtnInsertModal("BtnInsertModal", "ModalInsert", "php/Tenant/ModalShow/TenantAppraisalInsert.php");

BtnDeleteModal("BtnDeleteModal", "TableInfo", "ModalDelete", "php/Tenant/ModalShow/ModalShowDelte.php","cus_scale_id");

BtnConfirmDelete("BtnConfirmDelete", "TableInfo", "DivModalDelete", "php/Tenant/Action/Delete/TenantInfoDelete.php","cus_scale_id");

BtnSearch("BtnSearch", "InputSearch", "SelectSearchAttribute", "score", "TableInfo", "php/Tenant/Action/Search/TenantAppraisalSearch.php")