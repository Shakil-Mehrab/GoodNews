import autocomplete from 'autocomplete.js'
import algolia from 'algoliasearch'
var index = algolia('X6HT61OCY9','47ccb6f8309a40c9d1f0e5d77ab75580')
export const listingsautocomplete = (selector,{categoryId,areaIds}) =>{
	var listings = index.initIndex('news')

	var areaFilters = 'news.id ='+ areaIds.join(' OR news.id= ')
	var filters=areaFilters

	if(typeof categoryId !== 'undefined'){
		filters = filters + ' AND category.id != ' + categoryId
	}
	var sources = [{
			source: autocomplete.sources.hits(listings, {hitsPerPage: 5 }),
			templates: {
				header:()=>{
					if(typeof categoryId !== 'undefined'){
					return '<div class="aa-suggestions-category">Other Categories</div>';
				}
					return '<div class="aa-suggestions-category">All Categories</div>';
				},
				suggestion(suggestion){
					return '<span><a href="/single-news/' + suggestion.id +'">'+ suggestion.heading +'</a> in ' + suggestion.category.name + '</span><span> '+ suggestion.created_at_human +'</span>'

				}
			},
			displayKey: 'heading',
			empty:'<div class="aa-empty">NO listings found</div>'
		}];

		if(typeof categoryId !== 'undefined'){
			sources.unshift({
				source: autocomplete.sources.hits(listings, {hitsPerPage: 5, filters: '(' + areaFilters + ') AND category.id = ' + categoryId + ' AND live = 1' }),
			
			templates: {
				header: '<div class="aa-suggestions-category">This Category</div>',
				suggestion(suggestion){
					return '<span><a href="/' + suggestion.area.slug + '/' + suggestion.id +'">'+ suggestion.title +'</a> </span> <span>'+ suggestion.created_at_human + '&bull;' + suggestion.area.name +'</span>'
				}
			},

			displayKey: 'name',
			
			empty:'<div class="aa-empty">NO listings found</div>'
		})
	}
		return autocomplete(selector, {}, sources)
}



