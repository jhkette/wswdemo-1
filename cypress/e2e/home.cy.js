describe('template spec', () => {

  beforeEach(() => {
    cy.visit('http://mysite.test/')
  })
  it('passes', () => {
   
    cy.get('h1')
    .should('exist')
  })
  it('a user journey to cyclocross events', () => {
    cy.viewport(1200, 1000)
    cy.get('#menu-main-menu-1').contains('Events').click()
    cy.url().should('include', '/events')
    cy.get('.nav-links').contains('CycloCross').click()
    cy.url().should('include', '/cyclocross')
    
  })

  it('a user journey to actvities then triathlon', () => {
    cy.viewport(1200, 1000)
    cy.get('#menu-main-menu-1').contains('Activities').click()
    cy.url().should('include', '/activities')
    cy.get('.nav-links').contains('Triathlon').click()
    cy.url().should('include', '/triathlon')
  })

  it('a mobile user journey to events', () => {
    cy.viewport('ipad-mini')
    cy.get('#nav-icon1').click()
    cy.get('#mobile-nav').contains('Events').click()
    cy.url().should('include', '/events')  
  })

  it('a mobile user journey to events', () => {
    cy.viewport('ipad-mini')
    cy.get('#nav-icon1').click()
    cy.get('#mobile-nav').contains('News').click()
    cy.url().should('include', '/news')  
  })


})