// 【編集不要】
// refs: https://qiita.com/raratyurara/items/3ec1d78bebb76bde641a
declare module "*.vue" {
  import type { DefineComponent } from "vue";
  const component: DefineComponent<{}, {}, any>;
  export default component;
}