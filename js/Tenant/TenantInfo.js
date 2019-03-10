//讀取資料庫資料
LoadData("php/Tenant/TenantInfo.php", "TableInfo", GetData, "class=1");
//讀取資料庫資料
LoadData("php/Tenant/Action/Getdata/SearchAttributeGetdata.php", "SelectSearchAttribute", SelectonGetData, "TableName="+"customer");
//Textarea編輯
TextareaEditSendData("TableInfo", "php/Tenant/Action/Update/TenantInfoUpdata.php", GetData, "class=1");
//Input編輯
InputEditSendData("TableInfo", "php/Tenant/Action/Update/TenantInfoUpdata.php", GetData, "class=1");
//開啟Iput tag 輸入功能
InputEdit("ModalInsert");
//取消按鍵清除Input tag的value
BtnCancel("BtnCancel","ModalInsert");
//Insert 按鍵功能
BtnInsert("BtnConfirmInsert", "DivModalAdd","php/Tenant/Action/Insert/FunctionInsert.php");

BtnInsertModal("BtnInsertModal", "ModalInsert", "php/Tenant/ModalShow/TenantInfoInsert.php");

BtnDeleteModal("BtnDeleteModal", "TableInfo", "ModalDelete", "php/Tenant/ModalShow/ModalShowDelte.php","cus_name");

BtnConfirmDelete("BtnConfirmDelete", "TableInfo", "DivModalDelete", "php/Tenant/Action/Delete/TenantInfoDelete.php","cus_name");

BtnSearch("BtnSearch", "InputSearch", "SelectSearchAttribute", "customer", "TableInfo", "php/Tenant/Action/Search/TenantInfoSearch.php")
