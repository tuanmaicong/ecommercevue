export function getUrlList(){
    const baseUrl = 'http://laravelandvue.test/api';
    return {
        getHeaderCategoriesData : ''+baseUrl+'/getCategoriesData',
        getHomeData : ''+baseUrl+'/getHomeData',
        getCategoryData: ''+baseUrl+'/getCategoryData',
    }
}
export default getUrlList;
