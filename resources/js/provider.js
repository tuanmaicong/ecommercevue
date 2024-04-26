export function getUrlList(){
    const baseUrl = 'http://laravelandvue.test/api';
    return {
        getHeaderCategoriesData : ''+baseUrl+'/getCategoriesData',
        getHomeData : ''+baseUrl+'/getHomeData',
    }
}
export default getUrlList;
