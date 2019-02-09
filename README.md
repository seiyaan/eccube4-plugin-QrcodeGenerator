# EC-CUBE４　QRコード表示プラグイン
現在開いているページのURLをQRコードで表示してくれるプラグインです。


## 使い方

当プラグインをインストールした後に、以下のコードを表示させたい箇所のTwigテンプレート内に設置してください。

```twig
{{ include('@QrcodeGenerator/default/qrcode.twig', ignore_missing=true) }}
```

## 対応ページ
- TOPページ default/index.twig
- 商品一覧ページ default/Product/list.twig
- 商品詳細ページ default/Product/detail.twig
