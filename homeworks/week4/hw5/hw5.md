## 1.什麼是 DOM ？
- 如果把javacript比喻成神經系統，HTML 是骨架，CSS 是皮膚，
DOM 就是把負責把神經命令傳達到骨架及皮膚的溝通橋樑，透過存取的
結構表述去更動網頁內容並能夠呈現出來。

## 2.什麼是 Ajax ？
- Ajax也稱為異步傳輸，當我們向別的網頁 Server 發送請求的同時，
還可以進行其他的動作，不需要刷新去讓他顯示。

我看到一位前輩非常有趣的比喻是：『一位男子進廁所，高高興興的解放完
卻發現廁所沒有衛生紙。』那有
- 不使用Ajax的做法:不顧屁股的感受出去怒買一捲回來用。
- 使用Ajax的做法:打電話請基友從門口遞進來，等的時候還可以打一場傳說。
是不是非常清楚明瞭！

## 3.HTTP method 有哪幾個？有什麼不一樣？
 HTTP Method 分別是 get, head, post, delete, put, patch。
- get：取得我們想要的資料。
- head：和 get 有點像，只是 head 只會取的 HTTP header 的資料。
- post：新增一項資料。（如果存在會新增一個新的）。
- put：新增一項資料，如果存在就覆蓋過去。（還是只有一筆資料）。
- patch：附加新的資料在已經存在的資料後面。（資料必須已經存在，patch 會擴充這項資料）
- delete：刪除資料。

## 4.GET 跟 POST 有哪些區別，可以試著舉幾個例子嗎？
- 譬如說我去餐廳點餐，我想知道所有的菜單內容(GET)，我決定點漢堡類的雞腿堡(POST)。
兩者的區別是 GET 讓我得到所有的資料，而 POST 是我必須給出條件讓它回傳我要的東西。

## 5.什麼是 RESTful API？
那要先從 REST 開場，基本上以 get, post, put, delete 為組織框架，是一種 API 的設
計風格，但對於發送Url路徑的命名並沒有特定的格式，例如說
- /api/get_file/
- /api/take_file/
同為取得檔案卻在命名上有不同的方式，造成可讀性降低，效率下降，這時候有人發表，RESTful 
的設計風格，我個人認為它是 REST 2.0 ，在原則上也是以 get, post, put, delete為主，
資源名稱應為名詞。避免將動詞作為資源名稱，例如 
- /api/file/（使用 http method GET 取得檔案）
- /api/file/（使用 http method POST 更新檔案）
在可讀性上明顯的提升了。


## 6.JSON 是什麼？
- 我們使用 Ajax 方法向後端把 JSON 資料請求回來，而 json 的內容結構基本上都是純文字資料，
以陣列或是物件顯示，目的是方便易讀，可以輕易的找到我們要的資料。

## 7.JSONP 是什麼？
- 指的是一種跨網域的資料存取，首先我們要發一個參數給跨域服務端證明我們是正派經營，他們
核准過後就會送回我們所要求的資料了。

## 8.要如何存取跨網域的 API？
- 例如說我想要抓取twitch的幾個頻道在我的網頁上顯示，那我就要去跟twitch遞交申請書(API)
跟著twitch制定的申請流程，寫申請書(Javascript)，再送出(Reuqest)到收取的部門(server)。




