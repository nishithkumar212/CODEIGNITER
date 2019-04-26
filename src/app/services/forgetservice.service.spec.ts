import { TestBed } from '@angular/core/testing';

import { ForgetserviceService } from './forgetservice.service';

describe('ForgetserviceService', () => {
  beforeEach(() => TestBed.configureTestingModule({}));

  it('should be created', () => {
    const service: ForgetserviceService = TestBed.get(ForgetserviceService);
    expect(service).toBeTruthy();
  });
});
