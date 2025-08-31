環境構築  

Dockerビルド  
1、git clone git@github.com:suzu1279/second-test.git     
2、DockerDesktopアプリを立ち上げる  
docker-compose up -d --build  
MacのM1・M2チップのPCの場合、マニフェストリストエントリに一致するマニフェストがlinux/arm64/v8にありませんのメッセージが表示されてビルドができない場合があります。エラーが発生する場合は、docker-compose.ymlファイルの「mysql」内に「platform」の項目を追加で記載してください  

mysql:  
イメージ: mysql:8.0.26  
環境:  

Laravel環境構築  
1、docker-compose exec php bash  
2、composer install  
3、「.env.example」ファイルを「.env」ファイルに命名を変更。または、新しく.envファイルを作成.env以下の環境変数を追加  
DB_CONNECTION=mysql  
DB_HOST=mysql  
DB_PORT=3306  
DB_DATABASE=laravel_db  
DB_USERNAME=laravel_user  
DB_PASSWORD=laravel_pass  
4、アプリケーションキーの作成  
php 職人 key:generate  
5、マイグレーションの実行  
php 職人 移行  
6、シーディングの実行  
php db:seed  
  
ER図  
/Users/tagamisuzuya/coachtech/second-test/src/.drawio.png  



URL  
・開発環境http://localhost/  
・phpmyAdmin http://localhost:8080/  
