name: inverse
layout: true
class: center, middle, inverse
---

# JS初心者からReact/Reduxへの道

〜またはなぜ人は生きていて死にたくなるのか〜

---
.left[
## アジェンダ

1. Introduction
2. 用語の説明
3. まだ可愛かった頃のJavaScript
4. 現代のJavaScriptで嬉しくなったこと
5. ES6でかける環境を構築してみよう
6. React、爆誕
7. Flux / Redux
8. Reduxの解説
]

---
# 1. Introduction
---

.left[
## なぜこんなスライドがあるのか

Reactは便利らしい

→じゃあJavaScriptやるか！

→なんだこの書き方。動かねぇし。クソか

→誰も説明してくれない……

→おちんちんびろーん(´∀｀)

_おちんちんびろーんになるのはよろしくない_
]

---

## こういう説明をするため

.left[
Reactは便利らしい

→Reactを使うにはBabelが必要だよ

→そういえば言ってなかったけどBabelで書くJSはES6だよ

→あ、EcmaScriptっていうのがあってね

→最近のブラウザとかのES実装はこうなっていてね.red[(このへんで何かを悟り始める)]

→あ、そうだ、サーバサイドJSがあってさ

→で、パッケージマネージャがあって

→その後ボトムアップで説明して、なんやかんやでReduxまで到達

→おちんちんびろーん(´∀｀)
]

---

## 新しい単語について

Reduxってなに

Reactってなに

Babelってなに

EcmaScriptってなに

ので概要説明も兼ねて用語を紹介する

---
# 2. 用語の説明
---

## EcmaScript (ES)

.left[
.red[
言語仕様。
]

この仕様にだいたい沿って作られた言語がJavaScriptと呼ばれる。

言い換えると、EcmaScriptの実装がJavaScript。

でも実はJavaScriptができてから「そういえば仕様ないのマジキチじゃね？」ってことで作られた。

複数のバージョンがある。

古いのはES3、少し前がES5、現在の主流がES6(a.k.a ES2015)。ES7も作られてきている。ES4は欠番
]

---

## JavaScript

.left[.red[
EcmaScriptを実装したもの。
]

実装できればどの場所に作ってもJavaScriptなので、

「JSだとこう書くよね(´∀｀)」という発言は、まず「それNodeの話？Babel？Adobeのイラストレーターで動くやつ？」とか「コイツどのEcmaScriptのバージョンの話しているんだ？」とか見極めなければいけない。

Webで検索するときは、日付を見て「ES5の話してるな、最近だからES6の話してるんだな、最近なのにES5かよ、最近なのにES3ｗｗｗｗｗ」

と考えないと死ぬので注意 (死んだ)
]

---

## Node

.left[.red[
JSのインタプリタ。
]

むかしJavaScriptがブラウザだけでしかほとんど使えなかった頃、偉い人が

「サーバでも使いたいねんけど(´∀｀)」とか言って作った。

コンソールで動くJavaScript。

```sh
$ node  # インタラクティブシェルを立ち上げる
$ node foo.js # JSファイルを実行する
```
]

---
## NPM (Node Package Manager)

.left[.red[
パッケージマネージャの１つ。
]

Node用に作られたJSファイルを格納するためのパッケージマネージャだったが、

汎用的になりすぎて、Nodeのためのものというより、JSのためのパッケージマネージャの地位を得た。

ライブラリはだいたいこれで入れる。

yumとかapt-getとかHomebrewとかcholateyとかgemとかpipとかMavenとかみたいなノリ
]

---

## Bower

.left[
<s>粗大ゴミ</s>
.red[
パッケージマネージャの１つ。
]

JSのパッケージマネージャのひとつ。

NPMが作られたあと、当時NPMはサーバ用のJSファイルを入れるとこだったので、「クライアント用のやつ必要じゃね？」と思われて作られた。

<s>最近では「Bower必要なくね？」と思われていじめられている。</s>

Bowerで入れれるものであればNPMでも入る確率がほぼ150%。

一度Bowerで入れたものをNPMで再び入れたあと、Bowerで入れたものを消したくなるという意味。
]

---

## Transpiler

.left[
.red[あたらしい仕様で書かれたJSを、古いJSに変換してくれるやつ]

これによって新しい書き方で書いたにも関わらず古いブラウザにも対応できるようになってしあわせ。

C言語で書かれたソースをコンパイルするとアセンブラのコードになる感じのやつ。

BabelもTranspilerのひとつ。
]

---

## Babel

.left[.red[Transpilerのひとつ。]

現在の主流。ES6(ES2015)の書き方でJavaScriptを書くことができる。

ES6で書いたやつをコンパイルしてES5にするノリ。
]

---

## Webpack

.left[.red[タスクランナーの１つ。]

「ファイルが変更されたらBabelでコンパイルする」だとか、変更したファイルをもとに、実際ブラウザで使うファイルなどを生成するためのツール。

`GNU Make`のJS版のようなもの。

他にもいっぱいある
]

---

## React

.left[.red[Webフレームワークの１つ。]

簡単にいうと、HTMLのタグをもっと高機能にしたタグを自分たちで自作できるようになった。

どのくらい高機能かというと、中にCSSやJavaScriptが入っているHTMLタグみたいなやつ。
]

---

## Flux

.left[.red[デザインパターンの１つ。]

こういう風にWebフレームワークを実装しましょうみたいにFacebookが提唱したやつ。

あんまりしらない
]


---

## Redux

.left[.red[
Fluxを参考にしたデザインパターンで実装されたフレームワーク。]

Reactとセットで使って、データ操作なんかを一手に担うやーつ。

ざっくり言うとReactに無かったモデルの部分を考えて作られたフレームワーク。

サーバとやり取りするためのAPIとかはない.red[（自分で入れろ）]

]

---

## 用語まとめ

.left[
用語　　　　　　　　　| 意味
---|---
EcmaScript | 言語仕様
JavaScript | その実装
Node | インタプリタ
NPM | パッケージマネージャ
Transpiler | JS変換してくれるやーつ
Babel | 変換してくれるやつの１つ
Webpack | タスクランナー
React | Webフレームワーク(View側)
Flux | デザインパターンの名前
Redux | Fluxみたいなやつの実装
]

---

# 3. まだ可愛かった頃のJavaScript

---

## 昔のJavaScriptは混沌だった

.left[
- Prototypeでがんばる
- クロージャーをつくってがんばる
- `this` is crazy.
- 全員グローバルおじさん
- イベントハンドラがカオス
- テストしにくいし、したくない、しない
- 新しいJSで書きたいけど、古いブラウザ対応しないといけないから書けない
- IE6死ね。IE7死ね。IE8死ね。IE9死ね。
- JSが嫌いだ
]

_JSでプログラミングするのは大変だろJK_

---

## 大変なのなんとかしたかった

「あたらしいバージョンのJSつくって、それで書いたやつを古いJSにもコンパイルできれば最強なんじゃね？」

「それだ！！！(ヽ´ω)」


---

## こうしてTranspilerが誕生した

.left[
いっぱい色々でてきたっぽいけど、その戦国時代を切り抜いてBabelがでてきたっぽい感じ。

2番手にTypeScriptがいるっぽい。

あたらしい書き方で書けるようになって嬉しくなったのが現代のJavaScript！
]

---

# 4. 現代のJavaScriptで嬉しくなったこと

~ 具体的になにがかわったのか ~

---

## インポート方法

.left[
#### 石器時代
```html
<script src="https://jqueryのやーつ"></script>
```

#### まだおばあちゃんが若かった頃
```js
var $ = require("jquery");
```

#### いま
```js
import $ from "jquery";
```
]

---

## 変数定義

.left[
#### まだアントニオ猪木が生きていた頃
```js
var x = 1;
var x = 1;
var x = 1;
```

_えっ、何度も宣言できるとか、いみがわからないよ_

#### いま
```js
let x = 1;
let x = 1; // エラーになる
const X = 2;
```
]

---

## Arrow function

.left[
#### まだ地球が誕生してなかった頃
```js
var x = (function(i) {
  return i * 2;
})(1);
```

#### いま
```js
let x = (i => i * 2)(1);
```
]

---
## モジュールのエクスポート

.left[
#### 石器時代
も、もじゅーるってなに
JSにモジュール？(ヽ´ω)？？？

#### まだルーク・スカイウォーカーがフォースをものにしていなかった頃
_x.js_
```js
module.exports = { foo: "bar" };
```
```js
> require('./x')
{ foo: 'bar' }
```

#### いま
```js
let foo = "bar";
export { foo };
export function x() {};
```
]

---
# これはかなり使いたい
---
# どうやって使うの？
---
# 5. ES6でかける環境を構築してみよう
---
## そのままじゃうごかないやつ
.left[
_exportX.js_
```js
export function x() { console.log('Hello World!'); };
```
_main.js_
```js
import { x } from './exportX'
x();
```

```sh
$ node main.js
```
]
_「それSyntaxエラーなんやけどｗｗｗﾌﾟｹﾞﾗ」と言われる_

---
# これを動かす！
---
.left[
- まずNode(JSのインタプリタ)をインストールします
```sh
$ brew install node
```
※ Homebrew前提

- Babel(JSを変換するやつ)をインストールします
```sh
$ export ET='es6_tutorial'; mkdir $ET; cd $ET
$ npm init
$ npm install --save-dev babel-cli
```
_ローカルにインストールする（∵ グローバルおじさん）_

- プリセット(※)をインストールします
```sh
$ npm i babel-preset-es2015 --save-dev
```
※ Babel本体にソースコードを突っ込む前に前処理してくれるやつ
- 設定ファイルにpreset情報をつっこむ
```sh
$ echo '{ "presets": ["es2015"] }' > .babelrc
```
]

---
## Babelをつかってみる

.left[
```sh
$ mkdir build
$ ./node_modules/.bin/babel exportX.js > build/exportX.js
$ ./node_modules/.bin/babel main.js > build/main.js
$ cd build
$ node main.js
Hello World!
```
]
---
## ./node_modules/〜って書くのとか毎回コンパイルするのダルい説

.left[
- `package.json`の`script`のとこに書く
```json
{
　"main": "foo.js",
　"scripts": {
　　"build":"babel main.js >build/main.js;babel exportX.js >build/exportX.js"
　},
　"author": ""
}
```

- `Webpack`とかタスクランナーを導入する
]

_めんどいので今回は説明しない_

---
# 6. React、爆誕
---

# そもそもなぜReactが誕生したのか
---

# はじめに神は天とJSを創造された

---
# JSは混沌であって、闇が深淵の面にあり、
---
# 神の霊が水の面を動いていた。
---
# 神は言われた。
---
# 「光あれ」
---
# ぼく「殺すぞ」
---
---
# こうしてjQueryがあった。
---
## jQueryは神

.left[
- セレクタ便利すぎはげわろりんぬ
- なんかよくわからんけどajaxすげぇ
- なんかよくわからんけどアニメーションすげぇ
- なんかよくわからんけどすげぇ
- コピペプログラマでも書けるのすげぇ
- jQueryはネ申
]

_もうこれでいいんじゃないか_

---
# しかしこんなに便利になったjQueryにあろうことか文句を言い出す輩が現れる
ぜいたくは敵だ！！！　非国民！！！
---
# jQueryはクソ
.left[
- イベント管理がカオスすぎてわからない
- そもそもJSがクソなのは変わってない
- ajaxのせいで非同期通信大変なんだけど？？？
- アニメーションとか作ったせいで俺たちもアニメーション作らなきゃいけなくなった説〜
- jQueryはクソ
]

_<s>ほとんど言いがかりに等しいものもあるが</s>なんとかしないといけない_
---
## MVCフレームワークの誕生(例: Backbone)

.left[
- サーバサイドみたいにクライアントもモデルとかわければいいんや！
- せや！ Viewのところだけ分けて書いたろ！
- 書きやすすぎわろりんぬｗｗｗ
- 整理整頓されてすごくハッピーヾ(｡>﹏<｡)ﾉﾞ✧。
- 大規模なプロジェクトはこれでキマリ！
- フレームワークはすごい
]

_とりあえず便利になった_
---
# しかしこんなに便利になったフレームワー(ry
---
## MVCは使いにくい

.left[
- [緊急]モデルが変更されたことによるモデル変更について by モデル
- バグが再現できないのでクライアントに差し戻し
- そもそもJSがクソなのは変わってない
- ajaxのせいで非同期通信大変なのも変わってない
- 内部でjQuery使ってんじゃねぇよ！ハゲ！
]

_その後いっぱいフレームワークが出て愚かにも戦争しはじめる_
---
# React現れる
---
# Reactを使うことで、動的なタグ(コンポーネントという)を生成できる
~ ぼくはそういうところに喜びを感じるんだ ~
---
## Reactのすごいところ
.left[
- jQuery殺した(最大の功績)
- あたらしいJSの書き方で書けて射幸心が煽られる
- Facebookが出しているのでメンテは継続されるはずという安心感
- JSXという書き方で、HTMLタグをそのまま書けて嬉しさある
- 学習コストそんなに高くない！
]

_Viewしかないけどな！_

---

## こんな感じでHTMLみたいに書ける
.left[
```js
export default class Courses extends Component {
    render() {
        const { courses } = this.props;

        return (
            <MuiThemeProvider muiTheme={getMuiTheme()}>
                <div style={styles.root}>
                  <GridList
                    cellHeight={400}
                    padding={20}
                    style={styles.gridList}
                  >
                  {courses && courses.map(course => (
                      <Course key={course.id} course={course} />
                  ))}
                  </GridList>
                </div>
            </MuiThemeProvider>
        )
    }
}
```
]

_Styleはインラインスタイルで書く。StyleもJSのオブジェクトでやった方が楽!_

---
## Reactの問題点

- モデルがない？ (Viewしか作ってねーよ！自分でなんとかして)
- コンポーネントがどういう状態かの管理ができない？（ばーか！！！）

_なんとかしないとReactの恩恵が受けられない……(ヽ´ω)_

---

# 7. Flux / Redux

---

# Fluxとは何か

---

.left[
- FluxはFacebookが提唱した
- Fluxはすごい
- Fluxは最高
- Fluxとは何か
- Flux言いたいだけ
- Fluxはデザインパターン
- Fluxを使えばよくわからないけど今までの問題点がすべて解決する
- Fluxとか別に普通だし
- Flux別に必要なくねｗｗｗ
- WebアプリはFluxの考え方で実装しないといけない
- Reactを使うのがFlux
- Fluxは一方通行
- Fluxは仕様
- Fluxは昔から使われていた
- Fluxってちょっとかっこいい名前つけたかっただけだろ
- Fluxは文学
]

---

## Fluxはデザインパターンの１つ。問題点をちょっと切り離してみただけ

.left[
Facebook「FluxでWebアプリ実装したら管理楽じゃね？？」

愚民ども「？？？？？？？？？？？？？？」

Facebook「こういう感じで実装すると楽だよね！」

愚民ども「……あ、あーーーー！な、なるほどねーー！たーしかに！！」

Facebook「広まってよかった。Reactもみんな使ってね！！」

愚民ども「React最高！Flux最高！」
]

---
## Redux現れる

.left[
すごい人「Fluxを参考にして作ったフレームワークです。たぶんこれがいちばん簡単だと思います」

Facebook「(゜o゜)」

Facebook「Reduxはすごい！！！！Fluxより洗練されてる！！！」

愚民ども「React最高！Redux最高！」
]
---
# 8. Reduxの解説
---
---
# だるいのでやらない
---
## ご清聴ありがとうございました
