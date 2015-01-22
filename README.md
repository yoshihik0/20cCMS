# 20cCMS

## 概要
DropBoxのPublicフォルダにおいたテキストファイルの情報を読みだして表示する、簡易CMSです。

## しくみ
index.php?id=p1
にアクセスすると、DropBoxのPublicフォルダにおいたテキストファイル「p1.txt」の情報を読み込んで表示します。
テキストファイルを増やせば、いくらでもページは増やせます。

DropBoxにおいたテキストファイルのなかで、「$$$項目名」の改行に続けて書いた部分が、実際のページの<?=$cms[‘項目名’] ?>の部分に表示されます。

## インストール
データを記録するテキストファイルは、DropboxのPublicフォルダにおいておきます。MacやPCのファインダーで、DropboxのPublicフォルダのなかにテキストファイルを入れて、右クリックで「公開リンクをコピー」を選ぶと、ファイルのURLがわかります。ファイル名を除けば、それがPublicフォルダのURLです。(ファイルを入れないと「公開リンクをコピー」ができません。)
「20cCMS.php」の指定部分に、フォルダのURLを記入しておきます。

2012年以降にDropboxに入会した人は、Publicフォルダがないようですが、その場合は、
https://www.dropbox.com/enable_public_folder
にアクセスすることで作れるようです。

普通にウェブページを作って拡張子を.phpにすると、これがテンプレートになります。
同じフォルダに「20cCMS.php」を置き、ソースの冒頭で
<?php include(’20cCMS.php’); ?>
のようにリンクします。基本、それだけ。

## 運用
「$$$項目名」＋改行に続けて、表示したい内容を書き込みます。テキストでもHTMLタグを使ってもOK。
各ページに共通する項目は「common.txt」というテキストファイルに書き込みます。

## マークダウンを使う場合
https://github.com/erusev/parsedown
から、
「Parsedown.php」をダウンロードして
「20cCMS.php」ファイルと同じフォルダに置き、
「20cCMS.php」内の指定部分3行の行頭の「//」を削除します。
項目名のあとに、[md]に続けてマークダウン記法で書くと、HTMLに展開されます。