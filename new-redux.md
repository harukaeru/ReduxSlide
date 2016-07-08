name: inverse
layout: true
class: center, middle, inverse
---
# Reduxをざっくり読んでみた
---
.left[
## アジェンダ

1. ReduxとReactの関係
2. Redux
3. デモ
]

---
# 1. ReduxとReactの関係
---
## ReduxとReactの関係
.left[
「Reduxと言えばReact」ぐらい結びついている印象があるReduxだが、本来Reduxはデザインパターンの実装なので、別にReactなんか微塵も関係なく使える。

Reduxの誕生の経緯こそReactが関わっているものの、Reduxは別にReactのためのものではない。

なので、Reduxを理解するためにReact部分を混ぜて説明するとカオスになるので、今回はReactを混ぜずにまず話していく。

Reactは関係ありません！！
]

---
## react-reduxというライブラリ
.left[

ReactとReduxは本来まったく違うものなので、使うときはreact-reduxというインターフェースをインストールして使う

この中に入っているProviderというReactコンポーネント, connectという関数を使って、ReactとReduxを結びつけて使っている

.red[Reactの話は以上で終わりです。]
]

---
# 2. Redux
---
## Store

.left[
Reduxは、データというデータはStoreというところで全部管理しましょうというやつ

MVCでは、状態(今ボタンは赤色か水色か・今データはABC順でソートされているのかどうかとかそういうやつ)は、viewが持っていた。

ヘタしたらhtmlタグのclass属性がその役割を果たしていた。

これではそのviewの状態がいったいどうなっているのかわかりにくい！！！

ReduxのStoreは、こういう状態(state)も単なるデータも全部Storeで管理して、それ以外のところは、レンダリング・関数で値をいじってあげるだけで、値を保持しなくていいんだよという、

.red[関数型言語みたいな感じ。]

Storeの本質は、すごく便利なJSのオブジェクトみたいな感じなので、普通にstore.fooとかやってデータを呼び出せる(でもやっちゃダメ)。
]

---
## Action

.left[
すべてのアクションは、JSのPlainObjectを生成して開始する。

これを作る関数をActionCreatorとか言ったりする。

PlainObjectというのは、JSの、ふつうのObject。let x = {} とか Object() とかでできるやつ。

ただしtypeがキーとして必須。

アクションの種類・アクションに必要な "ユーザーから与えられる情報" を書いておく。

アクションの中身については別途 Reducer というところで書く。

「何をしたいか」だけ書いておき、これをView側から呼び出す。

```javascript
{
  type: 'FILTER_PLAYER_NAME',
  filterPlayername: 'nakada'
}
```
]

---
## Reducer
.left[
ActionとStoreを結びつける関数。ここに「アクションの中身、いわゆるアクションの実態、何をするか」を書く。やることは以下

- storeに入る初期データを考える
- ユーザーから渡されたデータ、あるいはstoreに入っているデータをもとに新たなデータを作る
- storeのデータを変更する
]

---

.left[
こんなかんじ
```javascript
store['state'] = {
  playerData: {
    playernames: ['takana', 'nakada', 'nakata', 'tanaka', 'takada']
    // filterText: "nakada"
  }
};
```
```javascript
function playerData(state = { playernames: [] }, action) {
  switch(action.type) {
    case 'FILTER_PLAYER_NAME':
      return {
        ...state,
        filterName: action.filterPlayername
      };
  }
}
```
MVCで言うとここがモデルみたいなもの。
stateというのは、Storeの中の、playerNameReducerというキーにあるオブジェクト
]

---
.left[
※ ES7
```javascript
let spread = { a: 1, b: 2 };
let obj = { ...spread, c: 3};
console.log(obj); // -> { a: 1, b: 2, c: 3}
```

こういうふうにして、stateをReduxのstoreの中に入れる。
]

---

.left[
Viewではこう書く。stateの管理はしなくていいので、「stateがこう来たらこう！」だけ書けばいい。

もしstateがViewの中にもあると、「stateがこう来たらこっちのstateはこうなって……」とかを考える必要がある。

```javascript
// "ba".contains("a")  -> true
String.prototype.contains = function(string) { return this.indexOf(string) != -1 }

let playerDataState = store.getState()['playerData'];
let playernames = playerDataState.playernames;


let playernamesForDisplay = null;
if (playerDataState.filterName) {
  playernamesForDisplay = playernames.filter(
    playername => playername.contains(playerDataState.filterName)
  );
} else {
  playernamesForDisplay = playernames;
}


console.log(playernamesForDisplay);
```
]

---
.left[
毎回こんなことをするのはめんどくさいので、
```javascript
store.subscribe(listner);
```
とかやっておけば、storeが更新されたら自動で値を出力する、とかできる。

react-reduxは、これを中でやってくれてるので楽ちん。
]
---
# 3. デモ
