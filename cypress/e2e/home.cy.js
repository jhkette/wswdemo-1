import 'cypress-axe';

describe('user journeys', () => {
	beforeEach(() => {
		cy.visit('https://titan.dcs.bbk.ac.uk/~jkette01/wswdemo/');
	});

	it('cy.document() - get the document object', () => {
		// https://on.cypress.io/document
		cy.document().should('have.property', 'charset').and('eq', 'UTF-8');
	});

	it('cy.document() - get the document object', () => {
		// https://on.cypress.io/document
		cy.document().should('have.property', 'title');
		cy.visit('https://titan.dcs.bbk.ac.uk/~jkette01/wswdemo/activities/');
		cy.document().should('have.property', 'title');
	});

	it('a user journey to cyclocross events', () => {
		cy.viewport(1200, 1000);
		cy.get('#menu-menu-2').contains('Events').click();
		cy.url().should('include', '/events');
		cy.get('.nav-links').contains('Cyclocross').click();
		cy.url().should('include', '/cyclocross');
	});

	it('a user journey to actvities then triathlon', () => {
		cy.viewport(1200, 1000);
		cy.get('#menu-menu-2').contains('Activities').click();
		cy.url().should('include', '/activities');
		cy.get('.nav-links').contains('Triathlon').click();
		cy.url().should('include', '/triathlon');
	});

	it('a mobile user journey to events', () => {
		cy.viewport('ipad-mini');
		cy.get('#nav-icon1').click();
		cy.get('#mobile-nav').contains('Events').click();
		cy.url().should('include', '/events');
	});

	it('a mobile user journey to news', () => {
		cy.viewport('ipad-mini');
		cy.get('#nav-icon1').click();
		cy.get('#mobile-nav').contains('News').click();
		cy.url().should('include', '/news');
	});
});
