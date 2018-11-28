## 請說明 SQL Injection 的攻擊原理以及防範方法

- 因為SQL query 的寫法太簡易，讓client 端可以利用特殊字串拼接把惡意程式碼寫入資料庫竊取。

- 防範：使用prepare statement，在放變數的地方加上問號，再定義輸入值的格式，先行驗證client 端輸入的資訊，不讓client 端輸入SQL query。


## 請說明 XSS 的攻擊原理以及防範方法

- Cross-Site Scripting（跨站腳本攻擊）
- 通常指的是通過利用網頁開發時留下的漏洞，通過巧妙的方法注入惡意指令代碼到網頁，使用戶加載並執行攻擊者惡意製造的網頁程序，大致分為三種類型。
   - Stored XSS (儲存型)
   - Reflected XSS (反射型)
   - DOM-Based XSS (基於 DOM 的類型)

- 防範方式：可使用 escapeHTML() 將所有惡意代碼都轉義，以文本形式展示，把代碼跟數據分開。


## 請說明 CSRF 的攻擊原理以及防範方法

- 使用者登入後，瀏覽器會記錄Cookies ，如果用户未登出或Cookies並未過期，並在期間使用者造訪其他危險網站，點擊了攻擊者的連結，便會向原網站發出某個功能請求，原網站的伺服器接收後會被誤會以為是用户合法操作。

- 防範方法：
 1.使用驗證碼
 2.驗證 Referer 的來源
 3.在 HTTP 以參數的形式加入隨機的token 來驗證


## 請舉出三種不同的雜湊函數

- SHA 團體 
- md5
- bcrypt


## 請去查什麼是 Session，以及 Session 跟 Cookie 的差別

- Cookie 是從client 端送過來的，負責存放用戶資料的容器，作用是例如填寫表單時會自動帶入用戶資料。

- session 較像是專用的通行證，它將用戶資料存在本機的記憶體裡，具體的機制是使用者完成身份認證後從下資料，並產生相對的session ID 其值為亂數組成所以較不容易被竊取，而且每次重新開機都會自動消失。

## `include`、`require`、`include_once`、`require_once` 的差別

- include 會產生警告，script會繼續執行。
- require 會產生錯誤，並停止script。
- include_once 跟require_once 是只會引入該文件一次，檔案若包含已引入的內容就不會重複引入了。
-
