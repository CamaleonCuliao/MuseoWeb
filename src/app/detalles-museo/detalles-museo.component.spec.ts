import { ComponentFixture, TestBed } from '@angular/core/testing';

import { DetallesMuseoComponent } from './detalles-museo.component';

describe('DetallesMuseoComponent', () => {
  let component: DetallesMuseoComponent;
  let fixture: ComponentFixture<DetallesMuseoComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      imports: [DetallesMuseoComponent]
    })
    .compileComponents();
    
    fixture = TestBed.createComponent(DetallesMuseoComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
