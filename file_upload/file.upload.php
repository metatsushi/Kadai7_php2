<?php 
require_once './dbc.php'; //dbc.phpを呼び出し


//ファイル関連の取得
$file = $_FILES['img'];
$filename = basename($file['name']); //ディレクトリとラバーザルを防ぐためにbasenameをつける
$tmp_path = $file['tmp_name'];
$file_err = $file['error'];
$filesize = $file['size'];
$upload_dir = 'images/';
$save_filename = date('YmdHis') . $filename;
$err_msgs = array();
$save_path = $upload_dir.$save_filename;

//キャプションを取得(フィルターインプット関数でPOSTかどうか確認、サニタイズする)
$caption = filter_input(INPUT_POST,'caption',
FILTER_SANITIZE_SPECIAL_CHARS);

//キャプションのバリデーション
//未入力のバリデーション
if(empty($caption)){
    array_push($err_msgs, 'Captionを入力してください');
}
//140文字以下かのバリデーション
if(strlen($caption)>140){
    array_push($err_msgs, 'Captionは140文字以内にで入力してください');
}

//ファイルのバリデーション
//ファイルサイズのバリデーション
if($filesize >10485760 || $file_err ==2 ) {
    array_push($err_msgs, 'ファイルサイズは10MB以下にしてください');
}

//拡張子のバリデーション
$allow_ext = array ('jpeg','png','jpg');
$file_ext = pathinfo($filename, PATHINFO_EXTENSION); //pathinfo関数で拡張子を取得（引数はfilename, PATHINFO_EXTENSION 第2引数は取りたいInfoによる)
if (!in_array(strtolower($file_ext), $allow_ext)){  //in_array関数（引数：①調べたい文字列・数値、②対象の配列） strtolower関数：全て小文字にする
    array_push($err_msgs, 'ファイルの拡張子はjpeg,png,jpgにしてください');
}

if(count($err_msgs) === 0){  //$err_msgを配列で用意して、エラーの時は配列にPushされるようにする
        //ファイルがあるかのバリデーション
        if (is_uploaded_file($tmp_path)){ //is_uploaded_file関数（引数：一時ディレクトリに保存されているかどうかで確認するので、一時Pathを入れる）
            if(move_uploaded_file($tmp_path, $save_path)){ //関数（一時保存のファイル名、保存先ディレクトリ名.ファイル名(ディレクトリ名ではなく、ファイル名である必要あり）
                echo $filename . 'が' . $upload_dir . 'にアップロードされました';
           //DBに保存する（ファイル名、ファイルパス、キャプション）
                $result = fileSave($filename, $save_path, $caption);
                if($result) {
                    echo 'データベースに保存しました';
                    } else {
                        echo 'データベースへの保存ができませんでした';
                    }

            }else {
                echo 'ファイルが保存できませんでした';
            }
            
        }else {
            echo 'ファイルが選択されていません';
            echo '<br>';
        }
    } else { //$err_msg配列が0でない（エラーが出たら）
        foreach($err_msgs as $msg){ //foreachで配列を分解し全てのエラーを表示
            echo $msg;
            echo '<br>';
        }
    }


?>
<a href='upload_form.php'>戻る</a>
