describe('template spec', () => {

    beforeEach(() => {
      cy.visit('https://titan.dcs.bbk.ac.uk/~jkette01/wswdemo/praesent-a-nunc-eros/')
    })
    // test on first accordion
    it('click on first accordion reveal answer', () => {
        cy.viewport(1200, 1000)
        // get question answer block
        cy.get('.question-answer').first().children('.answer-container') 
        // check css
        .should('have.css', 'max-height', '0px')
        // click the block
        cy.get('.question-answer').first().click()
        .children('.answer-container')
        // check classes and css of children
        .should('have.class', 'visible')
       
        .should('have.css', 'max-height', '1200px')
        
      })
      // perform the same test on the second block
      it('click on second accordion reveal answer', () => {
        cy.viewport(1200, 1000)
        cy.get('.question-answer').eq(1)
        .children('.answer-container') 
        .should('have.css', 'max-height', '0px')
        cy.get('.question-answer').eq(1).click()
        .children('.answer-container')
        .should('have.class', 'visible')
       
        .should('have.css', 'max-height', '1200px')    
      })
})