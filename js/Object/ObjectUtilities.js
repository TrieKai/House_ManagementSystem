//讀取資料庫資料
LoadData("php/Object/ObjectUtilities.php", "TableInfo", GetData, "class=1");
//讀取資料庫資料
LoadData("php/Tenant/Action/Getdata/SearchAttributeGetdata.php", "SelectSearchAttribute", SelectonGetData, "TableName="+"bill");
//Textarea編輯
TextareaEditSendData("TableInfo", "php/Object/Action/Update/ObjectUtilitiesUpdata.php", GetData, "class=1");
//Input編輯
InputEditSendData("TableInfo", "php/Object/Action/Update/ObjectUtilitiesUpdata.php", GetData, "class=1");
//開啟Iput tag 輸入功能
InputEdit("ModalInsert");
//取消按鍵清除Input tag的value
BtnCancel("BtnCancel","ModalInsert");
//Insert 按鍵功能
BtnInsert("BtnConfirmInsert", "ModalInsert","php/Tenant/Action/Insert/FunctionInsert.php");

BtnInsertModal("BtnInsertModal", "ModalInsert", "php/Object/ModalShow/ObjectUtilitiesInsert.php");

BtnDeleteModal("BtnDeleteModal", "TableInfo", "ModalDelete", "php/Tenant/ModalShow/ModalShowDelte.php","bill_id");

BtnConfirmDelete("BtnConfirmDelete", "TableInfo", "DivModalDelete", "php/Tenant/Action/Delete/TenantInfoDelete.php","bill_id");

BtnSearch("BtnSearch", "InputSearch", "SelectSearchAttribute", "bill", "TableInfo", "php/Object/Action/Search/ObjectUtilitiesSearch.php");