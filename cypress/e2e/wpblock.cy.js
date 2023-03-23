describe('template spec', () => {

    beforeEach(() => {
      cy.visit('http://mysite.test/2022/10/27/id-aperiam-et-voluptate-sit-et-amet/')
    })

    it('click on first accordion reveal answer', () => {
        cy.viewport(1200, 1000)
        cy.get('.question-answer').first().children('.answer-container') 
        .should('have.css', 'max-height', '0px')
        cy.get('.question-answer').first().click()
        .children('.answer-container')
        .should('have.class', 'visible')
        .should('have.css', 'opacity', '1')
        .should('have.css', 'max-height', '1200px')
        
      })

      it('click on second accordion reveal answer', () => {
        cy.viewport(1200, 1000)
        cy.get('.question-answer').eq(1).children('.answer-container') 
        .should('have.css', 'max-height', '0px')
        cy.get('.question-answer').eq(1).click()
        .children('.answer-container')
        .should('have.class', 'visible')
        .should('have.css', 'opacity', '1')
        .should('have.css', 'max-height', '1200px')    
      })


})