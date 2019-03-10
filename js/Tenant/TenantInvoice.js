//讀取資料庫資料
LoadData("php/Tenant/TenantInvoice.php", "TableInfo", GetData, "class=1");
//讀取資料庫資料
LoadData("php/Tenant/Action/Getdata/SearchAttributeGetdata.php", "SelectSearchAttribute", SelectonGetData, "TableName="+"invoice_record");
//Textarea編輯
TextareaEditSendData("TableInfo", "php/Tenant/Action/Update/TenantInvoiceUpdata.php", GetData, "class=1");
//Input編輯
InputEditSendData("TableInfo", "php/Tenant/Action/Update/TenantInvoiceUpdata.php", GetData, "class=1");
SelectEditSendData("TableInfo", "php/Tenant/Action/Update/TenantInvoiceUpdata.php", GetData, "class=1");
//開啟Iput tag 輸入功能
InputEdit("ModalInsert");
//取消按鍵清除Input tag的value
BtnCancel("BtnCancel","ModalInsert");
//Insert 按鍵功能
BtnInsert("BtnConfirmInsert", "ModalInsert","php/Tenant/Action/Insert/FunctionInsert.php");

BtnInsertModal("BtnInsertModal", "ModalInsert", "php/Tenant/ModalShow/TenantInvoiceInsert.php");

BtnDeleteModal("BtnDeleteModal", "TableInfo", "ModalDelete", "php/Tenant/ModalShow/ModalShowDelte.php","invoice_id");

BtnConfirmDelete("BtnConfirmDelete", "TableInfo", "DivModalDelete", "php/Tenant/Action/Delete/TenantInfoDelete.php","invoice_id");

BtnSearch("BtnSearch", "InputSearch", "SelectSearchAttribute", "invoice_record", "TableInfo", "php/Tenant/Action/Search/TenantInvoiceSearch.php")