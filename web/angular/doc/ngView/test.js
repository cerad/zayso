it('should load and compile correct template', function() {
  element('a:contains("Moby: Ch1")').click();
  var content = element('.doc-example-live [ng-view]').text();
  expect(content).toMatch(/controller\: ChapterCntl/);
  expect(content).toMatch(/Book Id\: Moby/);
  expect(content).toMatch(/Chapter Id\: 1/);
 
  element('a:contains("Scarlet")').click();
  content = element('.doc-example-live [ng-view]').text();
  expect(content).toMatch(/controller\: BookCntl/);
  expect(content).toMatch(/Book Id\: Scarlet/);
});
