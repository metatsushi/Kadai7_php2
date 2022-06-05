<?php
require_once './dbc.php'; //dbc.phpを呼び出し
$files = getAllFile();

?>
<!-- ①フォームの説明 -->
<!-- ②$_FILEの確認 -->
<!-- ③バリデーション -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>アップロードフォーム</title>
</head>
<style>
    body {
      padding: 30px;
      margin: 0 auto;
      width: 50%;
    }
    textarea {
      width: 98%;
      height: 60px;
    }
    .file-up {
      margin-bottom: 10px;
    }
    .submit {
      text-align: right;
    }
    .flex-container {
        display:flex;
    }
    img {
      height:200px;

    }
    .btn {
      display: inline-block;
      border-radius: 3px;
      font-size: 18px;
      background: #67c5ff;
      border: 2px solid #67c5ff;
      padding: 5px 10px;
      color: #fff;
      cursor: pointer;
    }
  </style>
 <body>
    <form enctype="multipart/form-data" action="file.upload.php" method="POST">
      <div class="file-up">
        <input type="hidden" name="MAX_FILE_SIZE" value="10485760" />
        <input name="img" type="file" accept="image/*" />
      </div>
      <div>
        <textarea
          name="caption"
          placeholder="説明（140文字以下）"
          id="caption"
        ></textarea>
      </div>
      <div class="submit">
        <input type="submit" value="送信" class="btn" />
      </div>
      <div class='flex-container'>
         <?php foreach($files as $file): ?>  
            <!-- phpを入れる場合はforeachかっこの後はセミコロンではなくコロン -->
            <div >
                <img src='<?php echo "{$file['file_path']}"; ?>' alt=''>
                <p><?php echo "{$file['description']}"; ?></p> 
            </div>
         <?php endforeach; ?>   
      </div>
    </form>
  </body>
</html>




  
 
