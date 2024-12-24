const { algoliasearch, instantsearch } = window;

const searchClient = algoliasearch(
  'BDEF6GEZ4Q',
  '963de354e9b970626ab13a98f3307632'
);

const search = instantsearch({
  indexName: 'jobs',
  searchClient,
  future: { preserveSharedStateOnUnmount: true },
});

search.addWidgets([
  instantsearch.widgets.searchBox({
    container: '#searchbox',
  }),
  instantsearch.widgets.hits({
    container: '#hits',
    templates: {
      item: (hit, { html, components }) => html`
        <article>
          <img src=${hit.employer_id} alt=${hit.title} />
          <div>
            <h1>${components.Highlight({ hit, attribute: 'title' })}</h1>
            <p>${components.Highlight({ hit, attribute: 'location' })}</p>
            <p>${components.Highlight({ hit, attribute: 'schedule' })}</p>
          </div>
        </article>
      `,
    },
  }),
  instantsearch.widgets.configure({
    hitsPerPage: 8,
  }),
  instantsearch.widgets.pagination({
    container: '#pagination',
  }),
]);

search.start();
